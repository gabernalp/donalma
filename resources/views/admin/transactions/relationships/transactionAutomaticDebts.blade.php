<div class="m-3">
    @can('automatic_debt_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.automatic-debts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.automaticDebt.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.automaticDebt.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-transactionAutomaticDebts">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.automaticDebt.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.automaticDebt.fields.transaction') }}
                            </th>
                            <th>
                                {{ trans('cruds.transaction.fields.value') }}
                            </th>
                            <th>
                                {{ trans('cruds.transaction.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.automaticDebt.fields.active') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($automaticDebts as $key => $automaticDebt)
                            <tr data-entry-id="{{ $automaticDebt->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $automaticDebt->id ?? '' }}
                                </td>
                                <td>
                                    {{ $automaticDebt->transaction->value ?? '' }}
                                </td>
                                <td>
                                    {{ $automaticDebt->transaction->value ?? '' }}
                                </td>
                                <td>
                                    {{ $automaticDebt->transaction->date ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $automaticDebt->active ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $automaticDebt->active ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @can('automatic_debt_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.automatic-debts.show', $automaticDebt->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('automatic_debt_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.automatic-debts.edit', $automaticDebt->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('automatic_debt_delete')
                                        <form action="{{ route('admin.automatic-debts.destroy', $automaticDebt->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('automatic_debt_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.automatic-debts.massDestroy') }}",
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
  let table = $('.datatable-transactionAutomaticDebts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection