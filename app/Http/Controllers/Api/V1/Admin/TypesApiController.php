<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Resources\Admin\TypeResource;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypeResource(Type::with(['globals'])->get());
    }

    public function store(StoreTypeRequest $request)
    {
        $type = Type::create($request->all());
        $type->globals()->sync($request->input('globals', []));
        if ($request->input('image', false)) {
            $type->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new TypeResource($type))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Type $type)
    {
        abort_if(Gate::denies('type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypeResource($type->load(['globals']));
    }

    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->all());
        $type->globals()->sync($request->input('globals', []));
        if ($request->input('image', false)) {
            if (!$type->image || $request->input('image') !== $type->image->file_name) {
                if ($type->image) {
                    $type->image->delete();
                }
                $type->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($type->image) {
            $type->image->delete();
        }

        return (new TypeResource($type))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Type $type)
    {
        abort_if(Gate::denies('type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
