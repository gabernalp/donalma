<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\Admin\OrganizationResource;
use App\Models\Organization;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('organization_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizationResource(Organization::with(['organization_types', 'dcoumenttype', 'department', 'city'])->get());
    }

    public function store(StoreOrganizationRequest $request)
    {
        $organization = Organization::create($request->all());
        $organization->organization_types()->sync($request->input('organization_types', []));
        if ($request->input('cc_file', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('cc_file'))))->toMediaCollection('cc_file');
        }

        if ($request->input('rl_file', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('rl_file'))))->toMediaCollection('rl_file');
        }

        if ($request->input('tp_file', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('tp_file'))))->toMediaCollection('tp_file');
        }

        if ($request->input('ar_file', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('ar_file'))))->toMediaCollection('ar_file');
        }

        if ($request->input('logo', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        return (new OrganizationResource($organization))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Organization $organization)
    {
        abort_if(Gate::denies('organization_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizationResource($organization->load(['organization_types', 'dcoumenttype', 'department', 'city']));
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->all());
        $organization->organization_types()->sync($request->input('organization_types', []));
        if ($request->input('cc_file', false)) {
            if (!$organization->cc_file || $request->input('cc_file') !== $organization->cc_file->file_name) {
                if ($organization->cc_file) {
                    $organization->cc_file->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('cc_file'))))->toMediaCollection('cc_file');
            }
        } elseif ($organization->cc_file) {
            $organization->cc_file->delete();
        }

        if ($request->input('rl_file', false)) {
            if (!$organization->rl_file || $request->input('rl_file') !== $organization->rl_file->file_name) {
                if ($organization->rl_file) {
                    $organization->rl_file->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('rl_file'))))->toMediaCollection('rl_file');
            }
        } elseif ($organization->rl_file) {
            $organization->rl_file->delete();
        }

        if ($request->input('tp_file', false)) {
            if (!$organization->tp_file || $request->input('tp_file') !== $organization->tp_file->file_name) {
                if ($organization->tp_file) {
                    $organization->tp_file->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('tp_file'))))->toMediaCollection('tp_file');
            }
        } elseif ($organization->tp_file) {
            $organization->tp_file->delete();
        }

        if ($request->input('ar_file', false)) {
            if (!$organization->ar_file || $request->input('ar_file') !== $organization->ar_file->file_name) {
                if ($organization->ar_file) {
                    $organization->ar_file->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('ar_file'))))->toMediaCollection('ar_file');
            }
        } elseif ($organization->ar_file) {
            $organization->ar_file->delete();
        }

        if ($request->input('logo', false)) {
            if (!$organization->logo || $request->input('logo') !== $organization->logo->file_name) {
                if ($organization->logo) {
                    $organization->logo->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($organization->logo) {
            $organization->logo->delete();
        }

        return (new OrganizationResource($organization))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Organization $organization)
    {
        abort_if(Gate::denies('organization_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
