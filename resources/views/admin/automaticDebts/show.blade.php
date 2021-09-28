@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.automaticDebt.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.automatic-debts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.automaticDebt.fields.id') }}
                        </th>
                        <td>
                            {{ $automaticDebt->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.automaticDebt.fields.transaction') }}
                        </th>
                        <td>
                            {{ $automaticDebt->transaction->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.automaticDebt.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $automaticDebt->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.automatic-debts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection