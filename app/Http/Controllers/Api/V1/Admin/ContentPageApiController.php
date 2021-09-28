<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreContentPageRequest;
use App\Http\Requests\UpdateContentPageRequest;
use App\Http\Resources\Admin\ContentPageResource;
use App\Models\ContentPage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentPageApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('content_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContentPageResource(ContentPage::with(['categories', 'tags'])->get());
    }

    public function store(StoreContentPageRequest $request)
    {
        $contentPage = ContentPage::create($request->all());
        $contentPage->categories()->sync($request->input('categories', []));
        $contentPage->tags()->sync($request->input('tags', []));
        if ($request->input('image', false)) {
            $contentPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('file', false)) {
            $contentPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        return (new ContentPageResource($contentPage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ContentPage $contentPage)
    {
        abort_if(Gate::denies('content_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContentPageResource($contentPage->load(['categories', 'tags']));
    }

    public function update(UpdateContentPageRequest $request, ContentPage $contentPage)
    {
        $contentPage->update($request->all());
        $contentPage->categories()->sync($request->input('categories', []));
        $contentPage->tags()->sync($request->input('tags', []));
        if ($request->input('image', false)) {
            if (!$contentPage->image || $request->input('image') !== $contentPage->image->file_name) {
                if ($contentPage->image) {
                    $contentPage->image->delete();
                }
                $contentPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($contentPage->image) {
            $contentPage->image->delete();
        }

        if ($request->input('file', false)) {
            if (!$contentPage->file || $request->input('file') !== $contentPage->file->file_name) {
                if ($contentPage->file) {
                    $contentPage->file->delete();
                }
                $contentPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($contentPage->file) {
            $contentPage->file->delete();
        }

        return (new ContentPageResource($contentPage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ContentPage $contentPage)
    {
        abort_if(Gate::denies('content_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentPage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
