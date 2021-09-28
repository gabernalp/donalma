@extends('layouts.admin')
@section('content')
@can('donation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.donations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.donation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.donation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Donation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.donation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.donation.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.donation.fields.organization') }}
                        </th>
                        <th>
                            {{ trans('cruds.donation.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.donation.fields.certification') }}
                        </th>
                        <th>
                            {{ trans('cruds.donation.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.donation.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donations as $key => $donation)
                        <tr data-entry-id="{{ $donation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $donation->id ?? '' }}
                            </td>
                            <td>
                                {{ $donation->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $donation->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $donation->organization->name ?? '' }}
                            </td>
                            <td>
                                {{ $donation->amount ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $donation->certification ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $donation->certification ? 'checked' : '' }}>
                            </td>
                            <td>
                                @if($donation->file)
                                    <a href="{{ $donation->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $donation->created_at ?? '' }}
                            </td>
                            <td>
                                @can('donation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.donations.show', $donation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('donation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.donations.edit', $donation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('donation_delete')
                                    <form action="{{ route('admin.donations.destroy', $donation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('donation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.donations.massDestroy') }}",
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
  let table = $('.datatable-Donation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection