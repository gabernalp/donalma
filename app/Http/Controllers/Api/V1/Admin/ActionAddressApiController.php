<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreActionAddressRequest;
use App\Http\Requests\UpdateActionAddressRequest;
use App\Http\Resources\Admin\ActionAddressResource;
use App\Models\ActionAddress;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActionAddressApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('action_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActionAddressResource(ActionAddress::with(['action', 'country', 'department', 'city'])->get());
    }

    public function store(StoreActionAddressRequest $request)
    {
        $actionAddress = ActionAddress::create($request->all());

        return (new ActionAddressResource($actionAddress))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ActionAddress $actionAddress)
    {
        abort_if(Gate::denies('action_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActionAddressResource($actionAddress->load(['action', 'country', 'department', 'city']));
    }

    public function update(UpdateActionAddressRequest $request, ActionAddress $actionAddress)
    {
        $actionAddress->update($request->all());

        return (new ActionAddressResource($actionAddress))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ActionAddress $actionAddress)
    {
        abort_if(Gate::denies('action_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actionAddress->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
