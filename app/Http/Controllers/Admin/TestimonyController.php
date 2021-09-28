<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTestimonyRequest;
use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Requests\UpdateTestimonyRequest;
use App\Models\Testimony;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TestimonyController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('testimony_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Testimony::query()->select(sprintf('%s.*', (new Testimony())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'testimony_show';
                $editGate = 'testimony_edit';
                $deleteGate = 'testimony_delete';
                $crudRoutePart = 'testimonies';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('testimonial_text', function ($row) {
                return $row->testimonial_text ? $row->testimonial_text : '';
            });
            $table->editColumn('featured', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->featured ? 'checked' : null) . '>';
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'featured']);

            return $table->make(true);
        }

        return view('admin.testimonies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('testimony_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonies.create');
    }

    public function store(StoreTestimonyRequest $request)
    {
        $testimony = Testimony::create($request->all());

        if ($request->input('image', false)) {
            $testimony->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $testimony->id]);
        }

        return redirect()->route('admin.testimonies.index');
    }

    public function edit(Testimony $testimony)
    {
        abort_if(Gate::denies('testimony_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonies.edit', compact('testimony'));
    }

    public function update(UpdateTestimonyRequest $request, Testimony $testimony)
    {
        $testimony->update($request->all());

        if ($request->input('image', false)) {
            if (!$testimony->image || $request->input('image') !== $testimony->image->file_name) {
                if ($testimony->image) {
                    $testimony->image->delete();
                }
                $testimony->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($testimony->image) {
            $testimony->image->delete();
        }

        return redirect()->route('admin.testimonies.index');
    }

    public function show(Testimony $testimony)
    {
        abort_if(Gate::denies('testimony_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonies.show', compact('testimony'));
    }

    public function destroy(Testimony $testimony)
    {
        abort_if(Gate::denies('testimony_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimony->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestimonyRequest $request)
    {
        Testimony::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('testimony_create') && Gate::denies('testimony_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Testimony();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
