@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actionAddress.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.action-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.id') }}
                        </th>
                        <td>
                            {{ $actionAddress->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.action') }}
                        </th>
                        <td>
                            {{ $actionAddress->action->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.address') }}
                        </th>
                        <td>
                            {{ $actionAddress->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.country') }}
                        </th>
                        <td>
                            {{ $actionAddress->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.department') }}
                        </th>
                        <td>
                            {{ $actionAddress->department->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.city') }}
                        </th>
                        <td>
                            {{ $actionAddress->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.email') }}
                        </th>
                        <td>
                            {{ $actionAddress->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.phone') }}
                        </th>
                        <td>
                            {{ $actionAddress->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.mapa') }}
                        </th>
                        <td>
                            {!! $actionAddress->mapa !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionAddress.fields.comments') }}
                        </th>
                        <td>
                            {{ $actionAddress->comments }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.action-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection