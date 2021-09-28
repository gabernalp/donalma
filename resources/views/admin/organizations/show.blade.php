@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.organization.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.id') }}
                        </th>
                        <td>
                            {{ $organization->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.name') }}
                        </th>
                        <td>
                            {{ $organization->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.organization_type') }}
                        </th>
                        <td>
                            @foreach($organization->organization_types as $key => $organization_type)
                                <span class="label label-info">{{ $organization_type->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.nit') }}
                        </th>
                        <td>
                            {{ $organization->nit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.legal_representant') }}
                        </th>
                        <td>
                            {{ $organization->legal_representant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.dcoumenttype') }}
                        </th>
                        <td>
                            {{ $organization->dcoumenttype->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.document') }}
                        </th>
                        <td>
                            {{ $organization->document }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.cargo') }}
                        </th>
                        <td>
                            {{ $organization->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.address') }}
                        </th>
                        <td>
                            {{ $organization->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.department') }}
                        </th>
                        <td>
                            {{ $organization->department->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.city') }}
                        </th>
                        <td>
                            {{ $organization->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.phone') }}
                        </th>
                        <td>
                            {{ $organization->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.main_phone_ext') }}
                        </th>
                        <td>
                            {{ $organization->main_phone_ext }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.postal_code') }}
                        </th>
                        <td>
                            {{ $organization->postal_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.email') }}
                        </th>
                        <td>
                            {{ $organization->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.finnancial_contact') }}
                        </th>
                        <td>
                            {{ $organization->finnancial_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.finnancial_contact_email') }}
                        </th>
                        <td>
                            {{ $organization->finnancial_contact_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.finnancial_contact_phone') }}
                        </th>
                        <td>
                            {{ $organization->finnancial_contact_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.finnancial_contact_ext') }}
                        </th>
                        <td>
                            {{ $organization->finnancial_contact_ext }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.contracting_contact') }}
                        </th>
                        <td>
                            {{ $organization->contracting_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.contracting_contact_email') }}
                        </th>
                        <td>
                            {{ $organization->contracting_contact_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.contracting_contact_phone') }}
                        </th>
                        <td>
                            {{ $organization->contracting_contact_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.contracting_contact_ext') }}
                        </th>
                        <td>
                            {{ $organization->contracting_contact_ext }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.electronic_invoice_contact') }}
                        </th>
                        <td>
                            {{ $organization->electronic_invoice_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.electronic_invoice_email') }}
                        </th>
                        <td>
                            {{ $organization->electronic_invoice_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.electronic_invoice_phone') }}
                        </th>
                        <td>
                            {{ $organization->electronic_invoice_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.electronic_invoice_ext') }}
                        </th>
                        <td>
                            {{ $organization->electronic_invoice_ext }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.cash_banks_contact') }}
                        </th>
                        <td>
                            {{ $organization->cash_banks_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.cash_banks_email') }}
                        </th>
                        <td>
                            {{ $organization->cash_banks_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.cash_banks_phone') }}
                        </th>
                        <td>
                            {{ $organization->cash_banks_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.cash_banks_ext') }}
                        </th>
                        <td>
                            {{ $organization->cash_banks_ext }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.electronic_invoice_authorized_mail') }}
                        </th>
                        <td>
                            {{ $organization->electronic_invoice_authorized_mail }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.requiere_orden_de_compra') }}
                        </th>
                        <td>
                            {{ App\Models\Organization::REQUIERE_ORDEN_DE_COMPRA_RADIO[$organization->requiere_orden_de_compra] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.limit_day_to_invoice') }}
                        </th>
                        <td>
                            {{ $organization->limit_day_to_invoice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.national_tax_responsible') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->national_tax_responsible ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.local_tax_responsible') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->local_tax_responsible ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.local_tax_ammount') }}
                        </th>
                        <td>
                            {{ $organization->local_tax_ammount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.big_taxpayer') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->big_taxpayer ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.big_taxpayer_resolution') }}
                        </th>
                        <td>
                            {{ $organization->big_taxpayer_resolution }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.seft_taxreteiner') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->seft_taxreteiner ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.seft_taxreteiner_resolution') }}
                        </th>
                        <td>
                            {{ $organization->seft_taxreteiner_resolution }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.rst_tax') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->rst_tax ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.donation_certificate_issuer') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->donation_certificate_issuer ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.payment_collection_time') }}
                        </th>
                        <td>
                            {{ App\Models\Organization::PAYMENT_COLLECTION_TIME_SELECT[$organization->payment_collection_time] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.disclaimer') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->disclaimer ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.information_privacy_check') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->information_privacy_check ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.cc_file') }}
                        </th>
                        <td>
                            @if($organization->cc_file)
                                <a href="{{ $organization->cc_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.rl_file') }}
                        </th>
                        <td>
                            @if($organization->rl_file)
                                <a href="{{ $organization->rl_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.tp_file') }}
                        </th>
                        <td>
                            @if($organization->tp_file)
                                <a href="{{ $organization->tp_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.ar_file') }}
                        </th>
                        <td>
                            @if($organization->ar_file)
                                <a href="{{ $organization->ar_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.bc_file') }}
                        </th>
                        <td>
                            {{ $organization->bc_file }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.short_description') }}
                        </th>
                        <td>
                            {{ $organization->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.long_description') }}
                        </th>
                        <td>
                            {{ $organization->long_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.webpage') }}
                        </th>
                        <td>
                            {{ $organization->webpage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.logo') }}
                        </th>
                        <td>
                            @if($organization->logo)
                                <a href="{{ $organization->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $organization->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.embed_map') }}
                        </th>
                        <td>
                            {!! $organization->embed_map !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.embed_video') }}
                        </th>
                        <td>
                            {!! $organization->embed_video !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.tags') }}
                        </th>
                        <td>
                            {{ $organization->tags }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Organization::STATUS_SELECT[$organization->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.featured') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $organization->featured ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.comments') }}
                        </th>
                        <td>
                            {{ $organization->comments }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizations.index') }}">
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
            <a class="nav-link" href="#organization_donations" role="tab" data-toggle="tab">
                {{ trans('cruds.donation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#organization_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#organization_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#organization_events" role="tab" data-toggle="tab">
                {{ trans('cruds.event.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="organization_donations">
            @includeIf('admin.organizations.relationships.organizationDonations', ['donations' => $organization->organizationDonations])
        </div>
        <div class="tab-pane" role="tabpanel" id="organization_projects">
            @includeIf('admin.organizations.relationships.organizationProjects', ['projects' => $organization->organizationProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="organization_users">
            @includeIf('admin.organizations.relationships.organizationUsers', ['users' => $organization->organizationUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="organization_events">
            @includeIf('admin.organizations.relationships.organizationEvents', ['events' => $organization->organizationEvents])
        </div>
    </div>
</div>

@endsection