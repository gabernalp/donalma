@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.action.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.id') }}
                        </th>
                        <td>
                            {{ $action->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.title') }}
                        </th>
                        <td>
                            {{ $action->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.short_description') }}
                        </th>
                        <td>
                            {!! $action->short_description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.image') }}
                        </th>
                        <td>
                            @if($action->image)
                                <a href="{{ $action->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $action->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.featured') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $action->featured ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.action.fields.comments') }}
                        </th>
                        <td>
                            {{ $action->comments }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#action_action_addresses" role="tab" data-toggle="tab">
                {{ trans('cruds.actionAddress.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="action_action_addresses">
            @includeIf('admin.actions.relationships.actionActionAddresses', ['actionAddresses' => $action->actionActionAddresses])
        </div>
    </div>
</div>

@endsection