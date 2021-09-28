@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.globalObj.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.global-objs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.globalObj.fields.id') }}
                        </th>
                        <td>
                            {{ $globalObj->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.globalObj.fields.name') }}
                        </th>
                        <td>
                            {{ $globalObj->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.globalObj.fields.description') }}
                        </th>
                        <td>
                            {{ $globalObj->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.global-objs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection