@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="merchant">{{ trans('cruds.transaction.fields.merchant') }}</label>
                <input class="form-control {{ $errors->has('merchant') ? 'is-invalid' : '' }}" type="text" name="merchant" id="merchant" value="{{ old('merchant', $transaction->merchant) }}">
                @if($errors->has('merchant'))
                    <span class="text-danger">{{ $errors->first('merchant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state_pol">{{ trans('cruds.transaction.fields.state_pol') }}</label>
                <input class="form-control {{ $errors->has('state_pol') ? 'is-invalid' : '' }}" type="text" name="state_pol" id="state_pol" value="{{ old('state_pol', $transaction->state_pol) }}">
                @if($errors->has('state_pol'))
                    <span class="text-danger">{{ $errors->first('state_pol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.state_pol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="response_code_pol">{{ trans('cruds.transaction.fields.response_code_pol') }}</label>
                <input class="form-control {{ $errors->has('response_code_pol') ? 'is-invalid' : '' }}" type="text" name="response_code_pol" id="response_code_pol" value="{{ old('response_code_pol', $transaction->response_code_pol) }}">
                @if($errors->has('response_code_pol'))
                    <span class="text-danger">{{ $errors->first('response_code_pol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.response_code_pol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference_sale">{{ trans('cruds.transaction.fields.reference_sale') }}</label>
                <input class="form-control {{ $errors->has('reference_sale') ? 'is-invalid' : '' }}" type="text" name="reference_sale" id="reference_sale" value="{{ old('reference_sale', $transaction->reference_sale) }}">
                @if($errors->has('reference_sale'))
                    <span class="text-danger">{{ $errors->first('reference_sale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.reference_sale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference_pol">{{ trans('cruds.transaction.fields.reference_pol') }}</label>
                <input class="form-control {{ $errors->has('reference_pol') ? 'is-invalid' : '' }}" type="text" name="reference_pol" id="reference_pol" value="{{ old('reference_pol', $transaction->reference_pol) }}">
                @if($errors->has('reference_pol'))
                    <span class="text-danger">{{ $errors->first('reference_pol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.reference_pol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra_1">{{ trans('cruds.transaction.fields.extra_1') }}</label>
                <input class="form-control {{ $errors->has('extra_1') ? 'is-invalid' : '' }}" type="text" name="extra_1" id="extra_1" value="{{ old('extra_1', $transaction->extra_1) }}">
                @if($errors->has('extra_1'))
                    <span class="text-danger">{{ $errors->first('extra_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.extra_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="extra_2">{{ trans('cruds.transaction.fields.extra_2') }}</label>
                <input class="form-control {{ $errors->has('extra_2') ? 'is-invalid' : '' }}" type="text" name="extra_2" id="extra_2" value="{{ old('extra_2', $transaction->extra_2) }}">
                @if($errors->has('extra_2'))
                    <span class="text-danger">{{ $errors->first('extra_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.extra_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method">{{ trans('cruds.transaction.fields.payment_method') }}</label>
                <input class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', $transaction->payment_method) }}">
                @if($errors->has('payment_method'))
                    <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method_type">{{ trans('cruds.transaction.fields.payment_method_type') }}</label>
                <input class="form-control {{ $errors->has('payment_method_type') ? 'is-invalid' : '' }}" type="text" name="payment_method_type" id="payment_method_type" value="{{ old('payment_method_type', $transaction->payment_method_type) }}">
                @if($errors->has('payment_method_type'))
                    <span class="text-danger">{{ $errors->first('payment_method_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_method_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="installments_number">{{ trans('cruds.transaction.fields.installments_number') }}</label>
                <input class="form-control {{ $errors->has('installments_number') ? 'is-invalid' : '' }}" type="text" name="installments_number" id="installments_number" value="{{ old('installments_number', $transaction->installments_number) }}">
                @if($errors->has('installments_number'))
                    <span class="text-danger">{{ $errors->first('installments_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.installments_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="value">{{ trans('cruds.transaction.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $transaction->value) }}">
                @if($errors->has('value'))
                    <span class="text-danger">{{ $errors->first('value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.transaction.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="text" name="tax" id="tax" value="{{ old('tax', $transaction->tax) }}">
                @if($errors->has('tax'))
                    <span class="text-danger">{{ $errors->first('tax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction_date">{{ trans('cruds.transaction.fields.transaction_date') }}</label>
                <input class="form-control {{ $errors->has('transaction_date') ? 'is-invalid' : '' }}" type="text" name="transaction_date" id="transaction_date" value="{{ old('transaction_date', $transaction->transaction_date) }}">
                @if($errors->has('transaction_date'))
                    <span class="text-danger">{{ $errors->first('transaction_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.transaction_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_buyer">{{ trans('cruds.transaction.fields.email_buyer') }}</label>
                <input class="form-control {{ $errors->has('email_buyer') ? 'is-invalid' : '' }}" type="text" name="email_buyer" id="email_buyer" value="{{ old('email_buyer', $transaction->email_buyer) }}">
                @if($errors->has('email_buyer'))
                    <span class="text-danger">{{ $errors->first('email_buyer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.email_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cus">{{ trans('cruds.transaction.fields.cus') }}</label>
                <input class="form-control {{ $errors->has('cus') ? 'is-invalid' : '' }}" type="text" name="cus" id="cus" value="{{ old('cus', $transaction->cus) }}">
                @if($errors->has('cus'))
                    <span class="text-danger">{{ $errors->first('cus') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.cus_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pse_bank">{{ trans('cruds.transaction.fields.pse_bank') }}</label>
                <input class="form-control {{ $errors->has('pse_bank') ? 'is-invalid' : '' }}" type="text" name="pse_bank" id="pse_bank" value="{{ old('pse_bank', $transaction->pse_bank) }}">
                @if($errors->has('pse_bank'))
                    <span class="text-danger">{{ $errors->first('pse_bank') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.pse_bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.transaction.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $transaction->description) }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="billing_address">{{ trans('cruds.transaction.fields.billing_address') }}</label>
                <input class="form-control {{ $errors->has('billing_address') ? 'is-invalid' : '' }}" type="text" name="billing_address" id="billing_address" value="{{ old('billing_address', $transaction->billing_address) }}">
                @if($errors->has('billing_address'))
                    <span class="text-danger">{{ $errors->first('billing_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.billing_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shipping_address">{{ trans('cruds.transaction.fields.shipping_address') }}</label>
                <input class="form-control {{ $errors->has('shipping_address') ? 'is-invalid' : '' }}" type="text" name="shipping_address" id="shipping_address" value="{{ old('shipping_address', $transaction->shipping_address) }}">
                @if($errors->has('shipping_address'))
                    <span class="text-danger">{{ $errors->first('shipping_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.shipping_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.transaction.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $transaction->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_number_ach">{{ trans('cruds.transaction.fields.account_number_ach') }}</label>
                <input class="form-control {{ $errors->has('account_number_ach') ? 'is-invalid' : '' }}" type="text" name="account_number_ach" id="account_number_ach" value="{{ old('account_number_ach', $transaction->account_number_ach) }}">
                @if($errors->has('account_number_ach'))
                    <span class="text-danger">{{ $errors->first('account_number_ach') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.account_number_ach_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_type_ach">{{ trans('cruds.transaction.fields.account_type_ach') }}</label>
                <input class="form-control {{ $errors->has('account_type_ach') ? 'is-invalid' : '' }}" type="text" name="account_type_ach" id="account_type_ach" value="{{ old('account_type_ach', $transaction->account_type_ach) }}">
                @if($errors->has('account_type_ach'))
                    <span class="text-danger">{{ $errors->first('account_type_ach') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.account_type_ach_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="administrative_fee">{{ trans('cruds.transaction.fields.administrative_fee') }}</label>
                <input class="form-control {{ $errors->has('administrative_fee') ? 'is-invalid' : '' }}" type="text" name="administrative_fee" id="administrative_fee" value="{{ old('administrative_fee', $transaction->administrative_fee) }}">
                @if($errors->has('administrative_fee'))
                    <span class="text-danger">{{ $errors->first('administrative_fee') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.administrative_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="administrative_fee_base">{{ trans('cruds.transaction.fields.administrative_fee_base') }}</label>
                <input class="form-control {{ $errors->has('administrative_fee_base') ? 'is-invalid' : '' }}" type="text" name="administrative_fee_base" id="administrative_fee_base" value="{{ old('administrative_fee_base', $transaction->administrative_fee_base) }}">
                @if($errors->has('administrative_fee_base'))
                    <span class="text-danger">{{ $errors->first('administrative_fee_base') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.administrative_fee_base_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="administrative_fee_tax">{{ trans('cruds.transaction.fields.administrative_fee_tax') }}</label>
                <input class="form-control {{ $errors->has('administrative_fee_tax') ? 'is-invalid' : '' }}" type="text" name="administrative_fee_tax" id="administrative_fee_tax" value="{{ old('administrative_fee_tax', $transaction->administrative_fee_tax) }}">
                @if($errors->has('administrative_fee_tax'))
                    <span class="text-danger">{{ $errors->first('administrative_fee_tax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.administrative_fee_tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="authorization_code">{{ trans('cruds.transaction.fields.authorization_code') }}</label>
                <input class="form-control {{ $errors->has('authorization_code') ? 'is-invalid' : '' }}" type="text" name="authorization_code" id="authorization_code" value="{{ old('authorization_code', $transaction->authorization_code) }}">
                @if($errors->has('authorization_code'))
                    <span class="text-danger">{{ $errors->first('authorization_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.authorization_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank">{{ trans('cruds.transaction.fields.bank') }}</label>
                <input class="form-control {{ $errors->has('bank') ? 'is-invalid' : '' }}" type="text" name="bank" id="bank" value="{{ old('bank', $transaction->bank) }}">
                @if($errors->has('bank'))
                    <span class="text-danger">{{ $errors->first('bank') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="billing_city">{{ trans('cruds.transaction.fields.billing_city') }}</label>
                <input class="form-control {{ $errors->has('billing_city') ? 'is-invalid' : '' }}" type="text" name="billing_city" id="billing_city" value="{{ old('billing_city', $transaction->billing_city) }}">
                @if($errors->has('billing_city'))
                    <span class="text-danger">{{ $errors->first('billing_city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.billing_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="billing_country">{{ trans('cruds.transaction.fields.billing_country') }}</label>
                <input class="form-control {{ $errors->has('billing_country') ? 'is-invalid' : '' }}" type="text" name="billing_country" id="billing_country" value="{{ old('billing_country', $transaction->billing_country) }}">
                @if($errors->has('billing_country'))
                    <span class="text-danger">{{ $errors->first('billing_country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.billing_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commision_pol">{{ trans('cruds.transaction.fields.commision_pol') }}</label>
                <input class="form-control {{ $errors->has('commision_pol') ? 'is-invalid' : '' }}" type="text" name="commision_pol" id="commision_pol" value="{{ old('commision_pol', $transaction->commision_pol) }}">
                @if($errors->has('commision_pol'))
                    <span class="text-danger">{{ $errors->first('commision_pol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.commision_pol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commision_pol_currency">{{ trans('cruds.transaction.fields.commision_pol_currency') }}</label>
                <input class="form-control {{ $errors->has('commision_pol_currency') ? 'is-invalid' : '' }}" type="text" name="commision_pol_currency" id="commision_pol_currency" value="{{ old('commision_pol_currency', $transaction->commision_pol_currency) }}">
                @if($errors->has('commision_pol_currency'))
                    <span class="text-danger">{{ $errors->first('commision_pol_currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.commision_pol_currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_number">{{ trans('cruds.transaction.fields.customer_number') }}</label>
                <input class="form-control {{ $errors->has('customer_number') ? 'is-invalid' : '' }}" type="text" name="customer_number" id="customer_number" value="{{ old('customer_number', $transaction->customer_number) }}">
                @if($errors->has('customer_number'))
                    <span class="text-danger">{{ $errors->first('customer_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.customer_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date">{{ trans('cruds.transaction.fields.date') }}</label>
                <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $transaction->date) }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ip">{{ trans('cruds.transaction.fields.ip') }}</label>
                <input class="form-control {{ $errors->has('ip') ? 'is-invalid' : '' }}" type="text" name="ip" id="ip" value="{{ old('ip', $transaction->ip) }}">
                @if($errors->has('ip'))
                    <span class="text-danger">{{ $errors->first('ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_methodid">{{ trans('cruds.transaction.fields.payment_methodid') }}</label>
                <input class="form-control {{ $errors->has('payment_methodid') ? 'is-invalid' : '' }}" type="text" name="payment_methodid" id="payment_methodid" value="{{ old('payment_methodid', $transaction->payment_methodid) }}">
                @if($errors->has('payment_methodid'))
                    <span class="text-danger">{{ $errors->first('payment_methodid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_methodid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_request_state">{{ trans('cruds.transaction.fields.payment_request_state') }}</label>
                <input class="form-control {{ $errors->has('payment_request_state') ? 'is-invalid' : '' }}" type="text" name="payment_request_state" id="payment_request_state" value="{{ old('payment_request_state', $transaction->payment_request_state) }}">
                @if($errors->has('payment_request_state'))
                    <span class="text-danger">{{ $errors->first('payment_request_state') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_request_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pse_reference_1">{{ trans('cruds.transaction.fields.pse_reference_1') }}</label>
                <input class="form-control {{ $errors->has('pse_reference_1') ? 'is-invalid' : '' }}" type="text" name="pse_reference_1" id="pse_reference_1" value="{{ old('pse_reference_1', $transaction->pse_reference_1) }}">
                @if($errors->has('pse_reference_1'))
                    <span class="text-danger">{{ $errors->first('pse_reference_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.pse_reference_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pse_reference_2">{{ trans('cruds.transaction.fields.pse_reference_2') }}</label>
                <input class="form-control {{ $errors->has('pse_reference_2') ? 'is-invalid' : '' }}" type="text" name="pse_reference_2" id="pse_reference_2" value="{{ old('pse_reference_2', $transaction->pse_reference_2) }}">
                @if($errors->has('pse_reference_2'))
                    <span class="text-danger">{{ $errors->first('pse_reference_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.pse_reference_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pse_reference_3">{{ trans('cruds.transaction.fields.pse_reference_3') }}</label>
                <input class="form-control {{ $errors->has('pse_reference_3') ? 'is-invalid' : '' }}" type="text" name="pse_reference_3" id="pse_reference_3" value="{{ old('pse_reference_3', $transaction->pse_reference_3) }}">
                @if($errors->has('pse_reference_3'))
                    <span class="text-danger">{{ $errors->first('pse_reference_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.pse_reference_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="response_message_pol">{{ trans('cruds.transaction.fields.response_message_pol') }}</label>
                <input class="form-control {{ $errors->has('response_message_pol') ? 'is-invalid' : '' }}" type="text" name="response_message_pol" id="response_message_pol" value="{{ old('response_message_pol', $transaction->response_message_pol) }}">
                @if($errors->has('response_message_pol'))
                    <span class="text-danger">{{ $errors->first('response_message_pol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.response_message_pol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction_bank">{{ trans('cruds.transaction.fields.transaction_bank') }}</label>
                <input class="form-control {{ $errors->has('transaction_bank') ? 'is-invalid' : '' }}" type="text" name="transaction_bank" id="transaction_bank" value="{{ old('transaction_bank', $transaction->transaction_bank) }}">
                @if($errors->has('transaction_bank'))
                    <span class="text-danger">{{ $errors->first('transaction_bank') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.transaction_bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction">{{ trans('cruds.transaction.fields.transaction') }}</label>
                <input class="form-control {{ $errors->has('transaction') ? 'is-invalid' : '' }}" type="text" name="transaction" id="transaction" value="{{ old('transaction', $transaction->transaction) }}">
                @if($errors->has('transaction'))
                    <span class="text-danger">{{ $errors->first('transaction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.transaction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_method_name">{{ trans('cruds.transaction.fields.payment_method_name') }}</label>
                <input class="form-control {{ $errors->has('payment_method_name') ? 'is-invalid' : '' }}" type="text" name="payment_method_name" id="payment_method_name" value="{{ old('payment_method_name', $transaction->payment_method_name) }}">
                @if($errors->has('payment_method_name'))
                    <span class="text-danger">{{ $errors->first('payment_method_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_method_name_helper') }}</span>
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