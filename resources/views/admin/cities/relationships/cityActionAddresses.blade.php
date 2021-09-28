<div class="m-3">
    @can('action_address_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.action-addresses.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.actionAddress.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.actionAddress.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-cityActionAddresses">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.action') }}
                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.address') }}
                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.country') }}
                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.department') }}
                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.city') }}
                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.actionAddress.fields.comments') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actionAddresses as $key => $actionAddress)
                            <tr data-entry-id="{{ $actionAddress->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $actionAddress->id ?? '' }}
                                </td>
                                <td>
                                    {{ $actionAddress->action->title ?? '' }}
                                </td>
                                <td>
                                    {{ $actionAddress->address ?? '' }}
                                </td>
                                <td>
                                    {{ $actionAddress->country->name ?? '' }}
                                </td>
                                <td>
                                    {{ $actionAddress->department->name ?? '' }}
                                </td>
                                <td>
                                    {{ $actionAddress->city->name ?? '' }}
                                </td>
                                <td>
                                    {{ $actionAddress->email ?? '' }}
                                </td>
                                <td>
                                    {{ $actionAddress->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $actionAddress->comments ?? '' }}
                                </td>
                                <td>
                                    @can('action_address_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.action-addresses.show', $actionAddress->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('action_address_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.action-addresses.edit', $actionAddress->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('action_address_delete')
                                        <form action="{{ route('admin.action-addresses.destroy', $actionAddress->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('action_address_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.action-addresses.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-cityActionAddresses:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection