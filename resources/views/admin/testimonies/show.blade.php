@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.testimony.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.id') }}
                        </th>
                        <td>
                            {{ $testimony->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.name') }}
                        </th>
                        <td>
                            {{ $testimony->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.image') }}
                        </th>
                        <td>
                            @if($testimony->image)
                                <a href="{{ $testimony->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $testimony->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.testimonial_text') }}
                        </th>
                        <td>
                            {{ $testimony->testimonial_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.featured') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $testimony->featured ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.comments') }}
                        </th>
                        <td>
                            {{ $testimony->comments }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection