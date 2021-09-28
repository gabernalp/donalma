<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDonationRequest;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Models\Donation;
use App\Models\Organization;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DonationsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('donation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donations = Donation::with(['user', 'organization', 'media'])->get();

        return view('admin.donations.index', compact('donations'));
    }

    public function create()
    {
        abort_if(Gate::denies('donation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.donations.create', compact('users', 'organizations'));
    }

    public function store(StoreDonationRequest $request)
    {
        $donation = Donation::create($request->all());

        if ($request->input('file', false)) {
            $donation->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $donation->id]);
        }

        return redirect()->route('admin.donations.index');
    }

    public function edit(Donation $donation)
    {
        abort_if(Gate::denies('donation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $donation->load('user', 'organization');

        return view('admin.donations.edit', compact('users', 'organizations', 'donation'));
    }

    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        $donation->update($request->all());

        if ($request->input('file', false)) {
            if (!$donation->file || $request->input('file') !== $donation->file->file_name) {
                if ($donation->file) {
                    $donation->file->delete();
                }
                $donation->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($donation->file) {
            $donation->file->delete();
        }

        return redirect()->route('admin.donations.index');
    }

    public function show(Donation $donation)
    {
        abort_if(Gate::denies('donation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donation->load('user', 'organization');

        return view('admin.donations.show', compact('donation'));
    }

    public function destroy(Donation $donation)
    {
        abort_if(Gate::denies('donation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donation->delete();

        return back();
    }

    public function massDestroy(MassDestroyDonationRequest $request)
    {
        Donation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('donation_create') && Gate::denies('donation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Donation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
