@extends('layouts.admin')
@section('content')
@can('transaction_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transactions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transaction.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transaction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Transaction">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.merchant') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.state_pol') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.response_code_pol') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.reference_sale') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.reference_pol') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.extra_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.extra_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.payment_method') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.payment_method_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.installments_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.value') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.tax') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.transaction_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.email_buyer') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.cus') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.pse_bank') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.billing_address') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.shipping_address') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.account_number_ach') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.account_type_ach') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.administrative_fee') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.administrative_fee_base') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.administrative_fee_tax') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.authorization_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.bank') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.billing_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.billing_country') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.commision_pol') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.commision_pol_currency') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.customer_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.ip') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.payment_methodid') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.payment_request_state') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.pse_reference_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.pse_reference_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.pse_reference_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.response_message_pol') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.transaction_bank') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.transaction') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaction.fields.payment_method_name') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transaction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transactions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.transactions.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'merchant', name: 'merchant' },
{ data: 'state_pol', name: 'state_pol' },
{ data: 'response_code_pol', name: 'response_code_pol' },
{ data: 'reference_sale', name: 'reference_sale' },
{ data: 'reference_pol', name: 'reference_pol' },
{ data: 'extra_1', name: 'extra_1' },
{ data: 'extra_2', name: 'extra_2' },
{ data: 'payment_method', name: 'payment_method' },
{ data: 'payment_method_type', name: 'payment_method_type' },
{ data: 'installments_number', name: 'installments_number' },
{ data: 'value', name: 'value' },
{ data: 'tax', name: 'tax' },
{ data: 'transaction_date', name: 'transaction_date' },
{ data: 'email_buyer', name: 'email_buyer' },
{ data: 'cus', name: 'cus' },
{ data: 'pse_bank', name: 'pse_bank' },
{ data: 'description', name: 'description' },
{ data: 'billing_address', name: 'billing_address' },
{ data: 'shipping_address', name: 'shipping_address' },
{ data: 'phone', name: 'phone' },
{ data: 'account_number_ach', name: 'account_number_ach' },
{ data: 'account_type_ach', name: 'account_type_ach' },
{ data: 'administrative_fee', name: 'administrative_fee' },
{ data: 'administrative_fee_base', name: 'administrative_fee_base' },
{ data: 'administrative_fee_tax', name: 'administrative_fee_tax' },
{ data: 'authorization_code', name: 'authorization_code' },
{ data: 'bank', name: 'bank' },
{ data: 'billing_city', name: 'billing_city' },
{ data: 'billing_country', name: 'billing_country' },
{ data: 'commision_pol', name: 'commision_pol' },
{ data: 'commision_pol_currency', name: 'commision_pol_currency' },
{ data: 'customer_number', name: 'customer_number' },
{ data: 'date', name: 'date' },
{ data: 'ip', name: 'ip' },
{ data: 'payment_methodid', name: 'payment_methodid' },
{ data: 'payment_request_state', name: 'payment_request_state' },
{ data: 'pse_reference_1', name: 'pse_reference_1' },
{ data: 'pse_reference_2', name: 'pse_reference_2' },
{ data: 'pse_reference_3', name: 'pse_reference_3' },
{ data: 'response_message_pol', name: 'response_message_pol' },
{ data: 'transaction_bank', name: 'transaction_bank' },
{ data: 'transaction', name: 'transaction' },
{ data: 'payment_method_name', name: 'payment_method_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Transaction').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection