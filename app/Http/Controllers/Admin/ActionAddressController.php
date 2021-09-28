<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActionAddressRequest;
use App\Http\Requests\StoreActionAddressRequest;
use App\Http\Requests\UpdateActionAddressRequest;
use App\Models\Action;
use App\Models\ActionAddress;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ActionAddressController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('action_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ActionAddress::with(['action', 'country', 'department', 'city'])->select(sprintf('%s.*', (new ActionAddress())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'action_address_show';
                $editGate = 'action_address_edit';
                $deleteGate = 'action_address_delete';
                $crudRoutePart = 'action-addresses';

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
            $table->addColumn('action_title', function ($row) {
                return $row->action ? $row->action->title : '';
            });

            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->addColumn('country_name', function ($row) {
                return $row->country ? $row->country->name : '';
            });

            $table->addColumn('department_name', function ($row) {
                return $row->department ? $row->department->name : '';
            });

            $table->addColumn('city_name', function ($row) {
                return $row->city ? $row->city->name : '';
            });

            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'action', 'country', 'department', 'city']);

            return $table->make(true);
        }

        return view('admin.actionAddresses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('action_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actions = Action::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.actionAddresses.create', compact('actions', 'countries', 'departments', 'cities'));
    }

    public function store(StoreActionAddressRequest $request)
    {
        $actionAddress = ActionAddress::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $actionAddress->id]);
        }

        return redirect()->route('admin.action-addresses.index');
    }

    public function edit(ActionAddress $actionAddress)
    {
        abort_if(Gate::denies('action_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actions = Action::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actionAddress->load('action', 'country', 'department', 'city');

        return view('admin.actionAddresses.edit', compact('actions', 'countries', 'departments', 'cities', 'actionAddress'));
    }

    public function update(UpdateActionAddressRequest $request, ActionAddress $actionAddress)
    {
        $actionAddress->update($request->all());

        return redirect()->route('admin.action-addresses.index');
    }

    public function show(ActionAddress $actionAddress)
    {
        abort_if(Gate::denies('action_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actionAddress->load('action', 'country', 'department', 'city');

        return view('admin.actionAddresses.show', compact('actionAddress'));
    }

    public function destroy(ActionAddress $actionAddress)
    {
        abort_if(Gate::denies('action_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actionAddress->delete();

        return back();
    }

    public function massDestroy(MassDestroyActionAddressRequest $request)
    {
        ActionAddress::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('action_address_create') && Gate::denies('action_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ActionAddress();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
