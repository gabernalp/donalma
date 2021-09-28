@extends('layouts.admin')
@section('content')
@can('organization_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.organizations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.organization.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Organization', 'route' => 'admin.organizations.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.organization.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.organization_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.nit') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.legal_representant') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.dcoumenttype') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.document') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.cargo') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.department') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.city') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.main_phone_ext') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.postal_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.finnancial_contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.finnancial_contact_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.finnancial_contact_phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.finnancial_contact_ext') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.contracting_contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.contracting_contact_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.contracting_contact_phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.contracting_contact_ext') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.electronic_invoice_contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.electronic_invoice_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.electronic_invoice_phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.electronic_invoice_ext') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.cash_banks_contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.cash_banks_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.cash_banks_phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.cash_banks_ext') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.electronic_invoice_authorized_mail') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.requiere_orden_de_compra') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.limit_day_to_invoice') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.national_tax_responsible') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.local_tax_responsible') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.local_tax_ammount') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.big_taxpayer') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.big_taxpayer_resolution') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.seft_taxreteiner') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.seft_taxreteiner_resolution') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.rst_tax') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.donation_certificate_issuer') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.payment_collection_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.disclaimer') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.information_privacy_check') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.cc_file') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.rl_file') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.tp_file') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.ar_file') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.bc_file') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.short_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.long_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.webpage') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.logo') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.tags') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.featured') }}
                    </th>
                    <th>
                        {{ trans('cruds.organization.fields.comments') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($types as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($document_types as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($departments as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($cities as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Organization::REQUIERE_ORDEN_DE_COMPRA_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Organization::PAYMENT_COLLECTION_TIME_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Organization::STATUS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
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
@can('organization_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.organizations.massDestroy') }}",
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
    ajax: "{{ route('admin.organizations.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'organization_type', name: 'organization_types.name' },
{ data: 'nit', name: 'nit' },
{ data: 'legal_representant', name: 'legal_representant' },
{ data: 'dcoumenttype_name', name: 'dcoumenttype.name' },
{ data: 'document', name: 'document' },
{ data: 'cargo', name: 'cargo' },
{ data: 'address', name: 'address' },
{ data: 'department_name', name: 'department.name' },
{ data: 'city_name', name: 'city.name' },
{ data: 'phone', name: 'phone' },
{ data: 'main_phone_ext', name: 'main_phone_ext' },
{ data: 'postal_code', name: 'postal_code' },
{ data: 'email', name: 'email' },
{ data: 'finnancial_contact', name: 'finnancial_contact' },
{ data: 'finnancial_contact_email', name: 'finnancial_contact_email' },
{ data: 'finnancial_contact_phone', name: 'finnancial_contact_phone' },
{ data: 'finnancial_contact_ext', name: 'finnancial_contact_ext' },
{ data: 'contracting_contact', name: 'contracting_contact' },
{ data: 'contracting_contact_email', name: 'contracting_contact_email' },
{ data: 'contracting_contact_phone', name: 'contracting_contact_phone' },
{ data: 'contracting_contact_ext', name: 'contracting_contact_ext' },
{ data: 'electronic_invoice_contact', name: 'electronic_invoice_contact' },
{ data: 'electronic_invoice_email', name: 'electronic_invoice_email' },
{ data: 'electronic_invoice_phone', name: 'electronic_invoice_phone' },
{ data: 'electronic_invoice_ext', name: 'electronic_invoice_ext' },
{ data: 'cash_banks_contact', name: 'cash_banks_contact' },
{ data: 'cash_banks_email', name: 'cash_banks_email' },
{ data: 'cash_banks_phone', name: 'cash_banks_phone' },
{ data: 'cash_banks_ext', name: 'cash_banks_ext' },
{ data: 'electronic_invoice_authorized_mail', name: 'electronic_invoice_authorized_mail' },
{ data: 'requiere_orden_de_compra', name: 'requiere_orden_de_compra' },
{ data: 'limit_day_to_invoice', name: 'limit_day_to_invoice' },
{ data: 'national_tax_responsible', name: 'national_tax_responsible' },
{ data: 'local_tax_responsible', name: 'local_tax_responsible' },
{ data: 'local_tax_ammount', name: 'local_tax_ammount' },
{ data: 'big_taxpayer', name: 'big_taxpayer' },
{ data: 'big_taxpayer_resolution', name: 'big_taxpayer_resolution' },
{ data: 'seft_taxreteiner', name: 'seft_taxreteiner' },
{ data: 'seft_taxreteiner_resolution', name: 'seft_taxreteiner_resolution' },
{ data: 'rst_tax', name: 'rst_tax' },
{ data: 'donation_certificate_issuer', name: 'donation_certificate_issuer' },
{ data: 'payment_collection_time', name: 'payment_collection_time' },
{ data: 'disclaimer', name: 'disclaimer' },
{ data: 'information_privacy_check', name: 'information_privacy_check' },
{ data: 'cc_file', name: 'cc_file', sortable: false, searchable: false },
{ data: 'rl_file', name: 'rl_file', sortable: false, searchable: false },
{ data: 'tp_file', name: 'tp_file', sortable: false, searchable: false },
{ data: 'ar_file', name: 'ar_file', sortable: false, searchable: false },
{ data: 'bc_file', name: 'bc_file' },
{ data: 'short_description', name: 'short_description' },
{ data: 'long_description', name: 'long_description' },
{ data: 'webpage', name: 'webpage' },
{ data: 'logo', name: 'logo', sortable: false, searchable: false },
{ data: 'tags', name: 'tags' },
{ data: 'status', name: 'status' },
{ data: 'featured', name: 'featured' },
{ data: 'comments', name: 'comments' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Organization').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection