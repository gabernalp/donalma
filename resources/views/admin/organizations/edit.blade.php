@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.organization.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.organizations.update", [$organization->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.organization.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $organization->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="organization_types">{{ trans('cruds.organization.fields.organization_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('organization_types') ? 'is-invalid' : '' }}" name="organization_types[]" id="organization_types" multiple required>
                    @foreach($organization_types as $id => $organization_type)
                        <option value="{{ $id }}" {{ (in_array($id, old('organization_types', [])) || $organization->organization_types->contains($id)) ? 'selected' : '' }}>{{ $organization_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('organization_types'))
                    <span class="text-danger">{{ $errors->first('organization_types') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.organization_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nit">{{ trans('cruds.organization.fields.nit') }}</label>
                <input class="form-control {{ $errors->has('nit') ? 'is-invalid' : '' }}" type="number" name="nit" id="nit" value="{{ old('nit', $organization->nit) }}" step="1" required>
                @if($errors->has('nit'))
                    <span class="text-danger">{{ $errors->first('nit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.nit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="legal_representant">{{ trans('cruds.organization.fields.legal_representant') }}</label>
                <input class="form-control {{ $errors->has('legal_representant') ? 'is-invalid' : '' }}" type="text" name="legal_representant" id="legal_representant" value="{{ old('legal_representant', $organization->legal_representant) }}" required>
                @if($errors->has('legal_representant'))
                    <span class="text-danger">{{ $errors->first('legal_representant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.legal_representant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dcoumenttype_id">{{ trans('cruds.organization.fields.dcoumenttype') }}</label>
                <select class="form-control select2 {{ $errors->has('dcoumenttype') ? 'is-invalid' : '' }}" name="dcoumenttype_id" id="dcoumenttype_id" required>
                    @foreach($dcoumenttypes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dcoumenttype_id') ? old('dcoumenttype_id') : $organization->dcoumenttype->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dcoumenttype'))
                    <span class="text-danger">{{ $errors->first('dcoumenttype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.dcoumenttype_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="document">{{ trans('cruds.organization.fields.document') }}</label>
                <input class="form-control {{ $errors->has('document') ? 'is-invalid' : '' }}" type="number" name="document" id="document" value="{{ old('document', $organization->document) }}" step="1" required>
                @if($errors->has('document'))
                    <span class="text-danger">{{ $errors->first('document') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.document_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cargo">{{ trans('cruds.organization.fields.cargo') }}</label>
                <input class="form-control {{ $errors->has('cargo') ? 'is-invalid' : '' }}" type="text" name="cargo" id="cargo" value="{{ old('cargo', $organization->cargo) }}" required>
                @if($errors->has('cargo'))
                    <span class="text-danger">{{ $errors->first('cargo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.cargo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.organization.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $organization->address) }}" required>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_id">{{ trans('cruds.organization.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                    @foreach($departments as $id => $entry)
                        <option value="{{ $id }}" {{ (old('department_id') ? old('department_id') : $organization->department->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_id">{{ trans('cruds.organization.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $organization->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.organization.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $organization->phone) }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="main_phone_ext">{{ trans('cruds.organization.fields.main_phone_ext') }}</label>
                <input class="form-control {{ $errors->has('main_phone_ext') ? 'is-invalid' : '' }}" type="text" name="main_phone_ext" id="main_phone_ext" value="{{ old('main_phone_ext', $organization->main_phone_ext) }}">
                @if($errors->has('main_phone_ext'))
                    <span class="text-danger">{{ $errors->first('main_phone_ext') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.main_phone_ext_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="postal_code">{{ trans('cruds.organization.fields.postal_code') }}</label>
                <input class="form-control {{ $errors->has('postal_code') ? 'is-invalid' : '' }}" type="text" name="postal_code" id="postal_code" value="{{ old('postal_code', $organization->postal_code) }}">
                @if($errors->has('postal_code'))
                    <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.postal_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.organization.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $organization->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finnancial_contact">{{ trans('cruds.organization.fields.finnancial_contact') }}</label>
                <input class="form-control {{ $errors->has('finnancial_contact') ? 'is-invalid' : '' }}" type="text" name="finnancial_contact" id="finnancial_contact" value="{{ old('finnancial_contact', $organization->finnancial_contact) }}">
                @if($errors->has('finnancial_contact'))
                    <span class="text-danger">{{ $errors->first('finnancial_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.finnancial_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finnancial_contact_email">{{ trans('cruds.organization.fields.finnancial_contact_email') }}</label>
                <input class="form-control {{ $errors->has('finnancial_contact_email') ? 'is-invalid' : '' }}" type="email" name="finnancial_contact_email" id="finnancial_contact_email" value="{{ old('finnancial_contact_email', $organization->finnancial_contact_email) }}">
                @if($errors->has('finnancial_contact_email'))
                    <span class="text-danger">{{ $errors->first('finnancial_contact_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.finnancial_contact_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finnancial_contact_phone">{{ trans('cruds.organization.fields.finnancial_contact_phone') }}</label>
                <input class="form-control {{ $errors->has('finnancial_contact_phone') ? 'is-invalid' : '' }}" type="number" name="finnancial_contact_phone" id="finnancial_contact_phone" value="{{ old('finnancial_contact_phone', $organization->finnancial_contact_phone) }}" step="1">
                @if($errors->has('finnancial_contact_phone'))
                    <span class="text-danger">{{ $errors->first('finnancial_contact_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.finnancial_contact_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finnancial_contact_ext">{{ trans('cruds.organization.fields.finnancial_contact_ext') }}</label>
                <input class="form-control {{ $errors->has('finnancial_contact_ext') ? 'is-invalid' : '' }}" type="text" name="finnancial_contact_ext" id="finnancial_contact_ext" value="{{ old('finnancial_contact_ext', $organization->finnancial_contact_ext) }}">
                @if($errors->has('finnancial_contact_ext'))
                    <span class="text-danger">{{ $errors->first('finnancial_contact_ext') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.finnancial_contact_ext_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contracting_contact">{{ trans('cruds.organization.fields.contracting_contact') }}</label>
                <input class="form-control {{ $errors->has('contracting_contact') ? 'is-invalid' : '' }}" type="text" name="contracting_contact" id="contracting_contact" value="{{ old('contracting_contact', $organization->contracting_contact) }}">
                @if($errors->has('contracting_contact'))
                    <span class="text-danger">{{ $errors->first('contracting_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.contracting_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contracting_contact_email">{{ trans('cruds.organization.fields.contracting_contact_email') }}</label>
                <input class="form-control {{ $errors->has('contracting_contact_email') ? 'is-invalid' : '' }}" type="email" name="contracting_contact_email" id="contracting_contact_email" value="{{ old('contracting_contact_email', $organization->contracting_contact_email) }}">
                @if($errors->has('contracting_contact_email'))
                    <span class="text-danger">{{ $errors->first('contracting_contact_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.contracting_contact_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contracting_contact_phone">{{ trans('cruds.organization.fields.contracting_contact_phone') }}</label>
                <input class="form-control {{ $errors->has('contracting_contact_phone') ? 'is-invalid' : '' }}" type="text" name="contracting_contact_phone" id="contracting_contact_phone" value="{{ old('contracting_contact_phone', $organization->contracting_contact_phone) }}">
                @if($errors->has('contracting_contact_phone'))
                    <span class="text-danger">{{ $errors->first('contracting_contact_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.contracting_contact_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contracting_contact_ext">{{ trans('cruds.organization.fields.contracting_contact_ext') }}</label>
                <input class="form-control {{ $errors->has('contracting_contact_ext') ? 'is-invalid' : '' }}" type="text" name="contracting_contact_ext" id="contracting_contact_ext" value="{{ old('contracting_contact_ext', $organization->contracting_contact_ext) }}">
                @if($errors->has('contracting_contact_ext'))
                    <span class="text-danger">{{ $errors->first('contracting_contact_ext') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.contracting_contact_ext_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="electronic_invoice_contact">{{ trans('cruds.organization.fields.electronic_invoice_contact') }}</label>
                <input class="form-control {{ $errors->has('electronic_invoice_contact') ? 'is-invalid' : '' }}" type="text" name="electronic_invoice_contact" id="electronic_invoice_contact" value="{{ old('electronic_invoice_contact', $organization->electronic_invoice_contact) }}">
                @if($errors->has('electronic_invoice_contact'))
                    <span class="text-danger">{{ $errors->first('electronic_invoice_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.electronic_invoice_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="electronic_invoice_email">{{ trans('cruds.organization.fields.electronic_invoice_email') }}</label>
                <input class="form-control {{ $errors->has('electronic_invoice_email') ? 'is-invalid' : '' }}" type="email" name="electronic_invoice_email" id="electronic_invoice_email" value="{{ old('electronic_invoice_email', $organization->electronic_invoice_email) }}">
                @if($errors->has('electronic_invoice_email'))
                    <span class="text-danger">{{ $errors->first('electronic_invoice_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.electronic_invoice_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="electronic_invoice_phone">{{ trans('cruds.organization.fields.electronic_invoice_phone') }}</label>
                <input class="form-control {{ $errors->has('electronic_invoice_phone') ? 'is-invalid' : '' }}" type="number" name="electronic_invoice_phone" id="electronic_invoice_phone" value="{{ old('electronic_invoice_phone', $organization->electronic_invoice_phone) }}" step="1">
                @if($errors->has('electronic_invoice_phone'))
                    <span class="text-danger">{{ $errors->first('electronic_invoice_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.electronic_invoice_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="electronic_invoice_ext">{{ trans('cruds.organization.fields.electronic_invoice_ext') }}</label>
                <input class="form-control {{ $errors->has('electronic_invoice_ext') ? 'is-invalid' : '' }}" type="text" name="electronic_invoice_ext" id="electronic_invoice_ext" value="{{ old('electronic_invoice_ext', $organization->electronic_invoice_ext) }}">
                @if($errors->has('electronic_invoice_ext'))
                    <span class="text-danger">{{ $errors->first('electronic_invoice_ext') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.electronic_invoice_ext_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cash_banks_contact">{{ trans('cruds.organization.fields.cash_banks_contact') }}</label>
                <input class="form-control {{ $errors->has('cash_banks_contact') ? 'is-invalid' : '' }}" type="text" name="cash_banks_contact" id="cash_banks_contact" value="{{ old('cash_banks_contact', $organization->cash_banks_contact) }}">
                @if($errors->has('cash_banks_contact'))
                    <span class="text-danger">{{ $errors->first('cash_banks_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.cash_banks_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cash_banks_email">{{ trans('cruds.organization.fields.cash_banks_email') }}</label>
                <input class="form-control {{ $errors->has('cash_banks_email') ? 'is-invalid' : '' }}" type="email" name="cash_banks_email" id="cash_banks_email" value="{{ old('cash_banks_email', $organization->cash_banks_email) }}">
                @if($errors->has('cash_banks_email'))
                    <span class="text-danger">{{ $errors->first('cash_banks_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.cash_banks_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cash_banks_phone">{{ trans('cruds.organization.fields.cash_banks_phone') }}</label>
                <input class="form-control {{ $errors->has('cash_banks_phone') ? 'is-invalid' : '' }}" type="number" name="cash_banks_phone" id="cash_banks_phone" value="{{ old('cash_banks_phone', $organization->cash_banks_phone) }}" step="1">
                @if($errors->has('cash_banks_phone'))
                    <span class="text-danger">{{ $errors->first('cash_banks_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.cash_banks_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cash_banks_ext">{{ trans('cruds.organization.fields.cash_banks_ext') }}</label>
                <input class="form-control {{ $errors->has('cash_banks_ext') ? 'is-invalid' : '' }}" type="text" name="cash_banks_ext" id="cash_banks_ext" value="{{ old('cash_banks_ext', $organization->cash_banks_ext) }}">
                @if($errors->has('cash_banks_ext'))
                    <span class="text-danger">{{ $errors->first('cash_banks_ext') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.cash_banks_ext_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="electronic_invoice_authorized_mail">{{ trans('cruds.organization.fields.electronic_invoice_authorized_mail') }}</label>
                <input class="form-control {{ $errors->has('electronic_invoice_authorized_mail') ? 'is-invalid' : '' }}" type="email" name="electronic_invoice_authorized_mail" id="electronic_invoice_authorized_mail" value="{{ old('electronic_invoice_authorized_mail', $organization->electronic_invoice_authorized_mail) }}">
                @if($errors->has('electronic_invoice_authorized_mail'))
                    <span class="text-danger">{{ $errors->first('electronic_invoice_authorized_mail') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.electronic_invoice_authorized_mail_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.organization.fields.requiere_orden_de_compra') }}</label>
                @foreach(App\Models\Organization::REQUIERE_ORDEN_DE_COMPRA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('requiere_orden_de_compra') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="requiere_orden_de_compra_{{ $key }}" name="requiere_orden_de_compra" value="{{ $key }}" {{ old('requiere_orden_de_compra', $organization->requiere_orden_de_compra) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="requiere_orden_de_compra_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('requiere_orden_de_compra'))
                    <span class="text-danger">{{ $errors->first('requiere_orden_de_compra') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.requiere_orden_de_compra_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="limit_day_to_invoice">{{ trans('cruds.organization.fields.limit_day_to_invoice') }}</label>
                <input class="form-control {{ $errors->has('limit_day_to_invoice') ? 'is-invalid' : '' }}" type="number" name="limit_day_to_invoice" id="limit_day_to_invoice" value="{{ old('limit_day_to_invoice', $organization->limit_day_to_invoice) }}" step="1">
                @if($errors->has('limit_day_to_invoice'))
                    <span class="text-danger">{{ $errors->first('limit_day_to_invoice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.limit_day_to_invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('national_tax_responsible') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="national_tax_responsible" value="0">
                    <input class="form-check-input" type="checkbox" name="national_tax_responsible" id="national_tax_responsible" value="1" {{ $organization->national_tax_responsible || old('national_tax_responsible', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="national_tax_responsible">{{ trans('cruds.organization.fields.national_tax_responsible') }}</label>
                </div>
                @if($errors->has('national_tax_responsible'))
                    <span class="text-danger">{{ $errors->first('national_tax_responsible') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.national_tax_responsible_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('local_tax_responsible') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="local_tax_responsible" value="0">
                    <input class="form-check-input" type="checkbox" name="local_tax_responsible" id="local_tax_responsible" value="1" {{ $organization->local_tax_responsible || old('local_tax_responsible', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="local_tax_responsible">{{ trans('cruds.organization.fields.local_tax_responsible') }}</label>
                </div>
                @if($errors->has('local_tax_responsible'))
                    <span class="text-danger">{{ $errors->first('local_tax_responsible') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.local_tax_responsible_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="local_tax_ammount">{{ trans('cruds.organization.fields.local_tax_ammount') }}</label>
                <input class="form-control {{ $errors->has('local_tax_ammount') ? 'is-invalid' : '' }}" type="number" name="local_tax_ammount" id="local_tax_ammount" value="{{ old('local_tax_ammount', $organization->local_tax_ammount) }}" step="0.01">
                @if($errors->has('local_tax_ammount'))
                    <span class="text-danger">{{ $errors->first('local_tax_ammount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.local_tax_ammount_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('big_taxpayer') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="big_taxpayer" value="0">
                    <input class="form-check-input" type="checkbox" name="big_taxpayer" id="big_taxpayer" value="1" {{ $organization->big_taxpayer || old('big_taxpayer', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="big_taxpayer">{{ trans('cruds.organization.fields.big_taxpayer') }}</label>
                </div>
                @if($errors->has('big_taxpayer'))
                    <span class="text-danger">{{ $errors->first('big_taxpayer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.big_taxpayer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="big_taxpayer_resolution">{{ trans('cruds.organization.fields.big_taxpayer_resolution') }}</label>
                <input class="form-control {{ $errors->has('big_taxpayer_resolution') ? 'is-invalid' : '' }}" type="text" name="big_taxpayer_resolution" id="big_taxpayer_resolution" value="{{ old('big_taxpayer_resolution', $organization->big_taxpayer_resolution) }}">
                @if($errors->has('big_taxpayer_resolution'))
                    <span class="text-danger">{{ $errors->first('big_taxpayer_resolution') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.big_taxpayer_resolution_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('seft_taxreteiner') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="seft_taxreteiner" value="0">
                    <input class="form-check-input" type="checkbox" name="seft_taxreteiner" id="seft_taxreteiner" value="1" {{ $organization->seft_taxreteiner || old('seft_taxreteiner', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="seft_taxreteiner">{{ trans('cruds.organization.fields.seft_taxreteiner') }}</label>
                </div>
                @if($errors->has('seft_taxreteiner'))
                    <span class="text-danger">{{ $errors->first('seft_taxreteiner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.seft_taxreteiner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="seft_taxreteiner_resolution">{{ trans('cruds.organization.fields.seft_taxreteiner_resolution') }}</label>
                <input class="form-control {{ $errors->has('seft_taxreteiner_resolution') ? 'is-invalid' : '' }}" type="text" name="seft_taxreteiner_resolution" id="seft_taxreteiner_resolution" value="{{ old('seft_taxreteiner_resolution', $organization->seft_taxreteiner_resolution) }}">
                @if($errors->has('seft_taxreteiner_resolution'))
                    <span class="text-danger">{{ $errors->first('seft_taxreteiner_resolution') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.seft_taxreteiner_resolution_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('rst_tax') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="rst_tax" value="0">
                    <input class="form-check-input" type="checkbox" name="rst_tax" id="rst_tax" value="1" {{ $organization->rst_tax || old('rst_tax', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rst_tax">{{ trans('cruds.organization.fields.rst_tax') }}</label>
                </div>
                @if($errors->has('rst_tax'))
                    <span class="text-danger">{{ $errors->first('rst_tax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.rst_tax_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('donation_certificate_issuer') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="donation_certificate_issuer" value="0">
                    <input class="form-check-input" type="checkbox" name="donation_certificate_issuer" id="donation_certificate_issuer" value="1" {{ $organization->donation_certificate_issuer || old('donation_certificate_issuer', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="donation_certificate_issuer">{{ trans('cruds.organization.fields.donation_certificate_issuer') }}</label>
                </div>
                @if($errors->has('donation_certificate_issuer'))
                    <span class="text-danger">{{ $errors->first('donation_certificate_issuer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.donation_certificate_issuer_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.organization.fields.payment_collection_time') }}</label>
                <select class="form-control {{ $errors->has('payment_collection_time') ? 'is-invalid' : '' }}" name="payment_collection_time" id="payment_collection_time">
                    <option value disabled {{ old('payment_collection_time', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Organization::PAYMENT_COLLECTION_TIME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_collection_time', $organization->payment_collection_time) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_collection_time'))
                    <span class="text-danger">{{ $errors->first('payment_collection_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.payment_collection_time_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('disclaimer') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="disclaimer" value="0">
                    <input class="form-check-input" type="checkbox" name="disclaimer" id="disclaimer" value="1" {{ $organization->disclaimer || old('disclaimer', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="disclaimer">{{ trans('cruds.organization.fields.disclaimer') }}</label>
                </div>
                @if($errors->has('disclaimer'))
                    <span class="text-danger">{{ $errors->first('disclaimer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.disclaimer_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('information_privacy_check') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="information_privacy_check" value="0">
                    <input class="form-check-input" type="checkbox" name="information_privacy_check" id="information_privacy_check" value="1" {{ $organization->information_privacy_check || old('information_privacy_check', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="information_privacy_check">{{ trans('cruds.organization.fields.information_privacy_check') }}</label>
                </div>
                @if($errors->has('information_privacy_check'))
                    <span class="text-danger">{{ $errors->first('information_privacy_check') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.information_privacy_check_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cc_file">{{ trans('cruds.organization.fields.cc_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cc_file') ? 'is-invalid' : '' }}" id="cc_file-dropzone">
                </div>
                @if($errors->has('cc_file'))
                    <span class="text-danger">{{ $errors->first('cc_file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.cc_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rl_file">{{ trans('cruds.organization.fields.rl_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('rl_file') ? 'is-invalid' : '' }}" id="rl_file-dropzone">
                </div>
                @if($errors->has('rl_file'))
                    <span class="text-danger">{{ $errors->first('rl_file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.rl_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tp_file">{{ trans('cruds.organization.fields.tp_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('tp_file') ? 'is-invalid' : '' }}" id="tp_file-dropzone">
                </div>
                @if($errors->has('tp_file'))
                    <span class="text-danger">{{ $errors->first('tp_file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.tp_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ar_file">{{ trans('cruds.organization.fields.ar_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('ar_file') ? 'is-invalid' : '' }}" id="ar_file-dropzone">
                </div>
                @if($errors->has('ar_file'))
                    <span class="text-danger">{{ $errors->first('ar_file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.ar_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bc_file">{{ trans('cruds.organization.fields.bc_file') }}</label>
                <input class="form-control {{ $errors->has('bc_file') ? 'is-invalid' : '' }}" type="text" name="bc_file" id="bc_file" value="{{ old('bc_file', $organization->bc_file) }}">
                @if($errors->has('bc_file'))
                    <span class="text-danger">{{ $errors->first('bc_file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.bc_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_description">{{ trans('cruds.organization.fields.short_description') }}</label>
                <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description" id="short_description">{{ old('short_description', $organization->short_description) }}</textarea>
                @if($errors->has('short_description'))
                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.short_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="long_description">{{ trans('cruds.organization.fields.long_description') }}</label>
                <input class="form-control {{ $errors->has('long_description') ? 'is-invalid' : '' }}" type="text" name="long_description" id="long_description" value="{{ old('long_description', $organization->long_description) }}">
                @if($errors->has('long_description'))
                    <span class="text-danger">{{ $errors->first('long_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.long_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="webpage">{{ trans('cruds.organization.fields.webpage') }}</label>
                <input class="form-control {{ $errors->has('webpage') ? 'is-invalid' : '' }}" type="text" name="webpage" id="webpage" value="{{ old('webpage', $organization->webpage) }}">
                @if($errors->has('webpage'))
                    <span class="text-danger">{{ $errors->first('webpage') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.webpage_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.organization.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="embed_map">{{ trans('cruds.organization.fields.embed_map') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('embed_map') ? 'is-invalid' : '' }}" name="embed_map" id="embed_map">{!! old('embed_map', $organization->embed_map) !!}</textarea>
                @if($errors->has('embed_map'))
                    <span class="text-danger">{{ $errors->first('embed_map') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.embed_map_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="embed_video">{{ trans('cruds.organization.fields.embed_video') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('embed_video') ? 'is-invalid' : '' }}" name="embed_video" id="embed_video">{!! old('embed_video', $organization->embed_video) !!}</textarea>
                @if($errors->has('embed_video'))
                    <span class="text-danger">{{ $errors->first('embed_video') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.embed_video_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tags">{{ trans('cruds.organization.fields.tags') }}</label>
                <input class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" type="text" name="tags" id="tags" value="{{ old('tags', $organization->tags) }}">
                @if($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.tags_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.organization.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Organization::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $organization->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('featured') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="featured" value="0">
                    <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ $organization->featured || old('featured', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="featured">{{ trans('cruds.organization.fields.featured') }}</label>
                </div>
                @if($errors->has('featured'))
                    <span class="text-danger">{{ $errors->first('featured') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.featured_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.organization.fields.comments') }}</label>
                <textarea class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{{ old('comments', $organization->comments) }}</textarea>
                @if($errors->has('comments'))
                    <span class="text-danger">{{ $errors->first('comments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.organization.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.ccFileDropzone = {
    url: '{{ route('admin.organizations.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="cc_file"]').remove()
      $('form').append('<input type="hidden" name="cc_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cc_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($organization) && $organization->cc_file)
      var file = {!! json_encode($organization->cc_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cc_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.rlFileDropzone = {
    url: '{{ route('admin.organizations.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="rl_file"]').remove()
      $('form').append('<input type="hidden" name="rl_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="rl_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($organization) && $organization->rl_file)
      var file = {!! json_encode($organization->rl_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="rl_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.tpFileDropzone = {
    url: '{{ route('admin.organizations.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="tp_file"]').remove()
      $('form').append('<input type="hidden" name="tp_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="tp_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($organization) && $organization->tp_file)
      var file = {!! json_encode($organization->tp_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="tp_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.arFileDropzone = {
    url: '{{ route('admin.organizations.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="ar_file"]').remove()
      $('form').append('<input type="hidden" name="ar_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="ar_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($organization) && $organization->ar_file)
      var file = {!! json_encode($organization->ar_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="ar_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.organizations.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($organization) && $organization->logo)
      var file = {!! json_encode($organization->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.organizations.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $organization->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection