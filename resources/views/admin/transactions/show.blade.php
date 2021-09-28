@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transaction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.id') }}
                        </th>
                        <td>
                            {{ $transaction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.merchant') }}
                        </th>
                        <td>
                            {{ $transaction->merchant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.state_pol') }}
                        </th>
                        <td>
                            {{ $transaction->state_pol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.response_code_pol') }}
                        </th>
                        <td>
                            {{ $transaction->response_code_pol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.reference_sale') }}
                        </th>
                        <td>
                            {{ $transaction->reference_sale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.reference_pol') }}
                        </th>
                        <td>
                            {{ $transaction->reference_pol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.extra_1') }}
                        </th>
                        <td>
                            {{ $transaction->extra_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.extra_2') }}
                        </th>
                        <td>
                            {{ $transaction->extra_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $transaction->payment_method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.payment_method_type') }}
                        </th>
                        <td>
                            {{ $transaction->payment_method_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.installments_number') }}
                        </th>
                        <td>
                            {{ $transaction->installments_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.value') }}
                        </th>
                        <td>
                            {{ $transaction->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.tax') }}
                        </th>
                        <td>
                            {{ $transaction->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.transaction_date') }}
                        </th>
                        <td>
                            {{ $transaction->transaction_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.email_buyer') }}
                        </th>
                        <td>
                            {{ $transaction->email_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.cus') }}
                        </th>
                        <td>
                            {{ $transaction->cus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.pse_bank') }}
                        </th>
                        <td>
                            {{ $transaction->pse_bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.description') }}
                        </th>
                        <td>
                            {{ $transaction->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.billing_address') }}
                        </th>
                        <td>
                            {{ $transaction->billing_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.shipping_address') }}
                        </th>
                        <td>
                            {{ $transaction->shipping_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.phone') }}
                        </th>
                        <td>
                            {{ $transaction->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.account_number_ach') }}
                        </th>
                        <td>
                            {{ $transaction->account_number_ach }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.account_type_ach') }}
                        </th>
                        <td>
                            {{ $transaction->account_type_ach }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.administrative_fee') }}
                        </th>
                        <td>
                            {{ $transaction->administrative_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.administrative_fee_base') }}
                        </th>
                        <td>
                            {{ $transaction->administrative_fee_base }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.administrative_fee_tax') }}
                        </th>
                        <td>
                            {{ $transaction->administrative_fee_tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.authorization_code') }}
                        </th>
                        <td>
                            {{ $transaction->authorization_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.bank') }}
                        </th>
                        <td>
                            {{ $transaction->bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.billing_city') }}
                        </th>
                        <td>
                            {{ $transaction->billing_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.billing_country') }}
                        </th>
                        <td>
                            {{ $transaction->billing_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.commision_pol') }}
                        </th>
                        <td>
                            {{ $transaction->commision_pol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.commision_pol_currency') }}
                        </th>
                        <td>
                            {{ $transaction->commision_pol_currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.customer_number') }}
                        </th>
                        <td>
                            {{ $transaction->customer_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.date') }}
                        </th>
                        <td>
                            {{ $transaction->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.ip') }}
                        </th>
                        <td>
                            {{ $transaction->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.payment_methodid') }}
                        </th>
                        <td>
                            {{ $transaction->payment_methodid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.payment_request_state') }}
                        </th>
                        <td>
                            {{ $transaction->payment_request_state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.pse_reference_1') }}
                        </th>
                        <td>
                            {{ $transaction->pse_reference_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.pse_reference_2') }}
                        </th>
                        <td>
                            {{ $transaction->pse_reference_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.pse_reference_3') }}
                        </th>
                        <td>
                            {{ $transaction->pse_reference_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.response_message_pol') }}
                        </th>
                        <td>
                            {{ $transaction->response_message_pol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.transaction_bank') }}
                        </th>
                        <td>
                            {{ $transaction->transaction_bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.transaction') }}
                        </th>
                        <td>
                            {{ $transaction->transaction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaction.fields.payment_method_name') }}
                        </th>
                        <td>
                            {{ $transaction->payment_method_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
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
            <a class="nav-link" href="#transaction_automatic_debts" role="tab" data-toggle="tab">
                {{ trans('cruds.automaticDebt.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="transaction_automatic_debts">
            @includeIf('admin.transactions.relationships.transactionAutomaticDebts', ['automaticDebts' => $transaction->transactionAutomaticDebts])
        </div>
    </div>
</div>

@endsection