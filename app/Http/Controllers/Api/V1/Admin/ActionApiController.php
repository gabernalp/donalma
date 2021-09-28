<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreActionRequest;
use App\Http\Requests\UpdateActionRequest;
use App\Http\Resources\Admin\ActionResource;
use App\Models\Action;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('action_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActionResource(Action::all());
    }

    public function store(StoreActionRequest $request)
    {
        $action = Action::create($request->all());

        if ($request->input('image', false)) {
            $action->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new ActionResource($action))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Action $action)
    {
        abort_if(Gate::denies('action_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActionResource($action);
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

        return (new ActionResource($action))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Action $action)
    {
        abort_if(Gate::denies('action_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $action->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
