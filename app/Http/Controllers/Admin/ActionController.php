<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActionRequest;
use App\Http\Requests\StoreActionRequest;
use App\Http\Requests\UpdateActionRequest;
use App\Models\Action;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ActionController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('action_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Action::query()->select(sprintf('%s.*', (new Action())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'action_show';
                $editGate = 'action_edit';
                $deleteGate = 'action_delete';
                $crudRoutePart = 'actions';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
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
            $table->editColumn('featured', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->featured ? 'checked' : null) . '>';
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'featured']);

            return $table->make(true);
        }

        return view('admin.actions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('action_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actions.create');
    }

    public function store(StoreActionRequest $request)
    {
        $action = Action::create($request->all());

        if ($request->input('image', false)) {
            $action->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $action->id]);
        }

        return redirect()->route('admin.actions.index');
    }

    public function edit(Action $action)
    {
        abort_if(Gate::denies('action_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actions.edit', compact('action'));
    }

    public function update(UpdateActionRequest $request, Action $action)
    {
        $action->update($request->all());

        if ($request->input('image', false)) {
            if (!$action->image || $request->input('image') !== $action->image->file_name) {
                if ($action->image) {
                    $action->image->delete();
                }
                $action->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($action->image) {
            $action->image->delete();
        }

        return redirect()->route('admin.actions.index');
    }

    public function show(Action $action)
    {
        abort_if(Gate::denies('action_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action->load('actionActionAddresses');

        return view('admin.actions.show', compact('action'));
    }

    public function destroy(Action $action)
    {
        abort_if(Gate::denies('action_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action->delete();

        return back();
    }

    public function massDestroy(MassDestroyActionRequest $request)
    {
        Action::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('action_create') && Gate::denies('action_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Action();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
