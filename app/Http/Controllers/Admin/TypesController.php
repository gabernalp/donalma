<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTypeRequest;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\GlobalObj;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TypesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Type::with(['globals', 'media'])->get();

        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        abort_if(Gate::denies('type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $globals = GlobalObj::pluck('name', 'id');

        return view('admin.types.create', compact('globals'));
    }

    public function store(StoreTypeRequest $request)
    {
        $type = Type::create($request->all());
        $type->globals()->sync($request->input('globals', []));
        foreach ($request->input('image', []) as $file) {
            $type->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $type->id]);
        }

        return redirect()->route('admin.types.index');
    }

    public function edit(Type $type)
    {
        abort_if(Gate::denies('type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $globals = GlobalObj::pluck('name', 'id');

        $type->load('globals');

        return view('admin.types.edit', compact('globals', 'type'));
    }

    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->all());
        $type->globals()->sync($request->input('globals', []));
        if (count($type->image) > 0) {
            foreach ($type->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $type->image->pluck('file_name')->toArray();
        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $type->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
            }
        }

        return redirect()->route('admin.types.index');
    }

    public function show(Type $type)
    {
        abort_if(Gate::denies('type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type->load('globals');

        return view('admin.types.show', compact('type'));
    }

    public function destroy(Type $type)
    {
        abort_if(Gate::denies('type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeRequest $request)
    {
        Type::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('type_create') && Gate::denies('type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Type();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
