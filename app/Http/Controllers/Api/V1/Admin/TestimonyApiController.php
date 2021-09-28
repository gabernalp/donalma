<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Requests\UpdateTestimonyRequest;
use App\Http\Resources\Admin\TestimonyResource;
use App\Models\Testimony;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestimonyApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('testimony_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestimonyResource(Testimony::all());
    }

    public function store(StoreTestimonyRequest $request)
    {
        $testimony = Testimony::create($request->all());

        if ($request->input('image', false)) {
            $testimony->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new TestimonyResource($testimony))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Testimony $testimony)
    {
        abort_if(Gate::denies('testimony_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TestimonyResource($testimony);
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

        return (new TestimonyResource($testimony))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Testimony $testimony)
    {
        abort_if(Gate::denies('testimony_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimony->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
