@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.donation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.donations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.id') }}
                        </th>
                        <td>
                            {{ $donation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.user') }}
                        </th>
                        <td>
                            {{ $donation->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.organization') }}
                        </th>
                        <td>
                            {{ $donation->organization->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.amount') }}
                        </th>
                        <td>
                            {{ $donation->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.certification') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $donation->certification ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.file') }}
                        </th>
                        <td>
                            @if($donation->file)
                                <a href="{{ $donation->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.donation.fields.created_at') }}
                        </th>
                        <td>
                            {{ $donation->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.donations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection