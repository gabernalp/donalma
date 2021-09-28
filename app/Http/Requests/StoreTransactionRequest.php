<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_create');
    }

    public function rules()
    {
        return [
            'merchant' => [
                'string',
                'nullable',
            ],
            'state_pol' => [
                'string',
                'nullable',
            ],
            'response_code_pol' => [
                'string',
                'nullable',
            ],
            'reference_sale' => [
                'string',
                'nullable',
            ],
            'reference_pol' => [
                'string',
                'nullable',
            ],
            'extra_1' => [
                'string',
                'nullable',
            ],
            'extra_2' => [
                'string',
                'nullable',
            ],
            'payment_method' => [
                'string',
                'nullable',
            ],
            'payment_method_type' => [
                'string',
                'nullable',
            ],
            'installments_number' => [
                'string',
                'nullable',
            ],
            'value' => [
                'string',
                'nullable',
            ],
            'tax' => [
                'string',
                'nullable',
            ],
            'transaction_date' => [
                'string',
                'nullable',
            ],
            'email_buyer' => [
                'string',
                'nullable',
            ],
            'cus' => [
                'string',
                'nullable',
            ],
            'pse_bank' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'billing_address' => [
                'string',
                'nullable',
            ],
            'shipping_address' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'account_number_ach' => [
                'string',
                'nullable',
            ],
            'account_type_ach' => [
                'string',
                'nullable',
            ],
            'administrative_fee' => [
                'string',
                'nullable',
            ],
            'administrative_fee_base' => [
                'string',
                'nullable',
            ],
            'administrative_fee_tax' => [
                'string',
                'nullable',
            ],
            'authorization_code' => [
                'string',
                'nullable',
            ],
            'bank' => [
                'string',
                'nullable',
            ],
            'billing_city' => [
                'string',
                'nullable',
            ],
            'billing_country' => [
                'string',
                'nullable',
            ],
            'commision_pol' => [
                'string',
                'nullable',
            ],
            'commision_pol_currency' => [
                'string',
                'nullable',
            ],
            'customer_number' => [
                'string',
                'nullable',
            ],
            'date' => [
                'string',
                'nullable',
            ],
            'ip' => [
                'string',
                'nullable',
            ],
            'payment_methodid' => [
                'string',
                'nullable',
            ],
            'payment_request_state' => [
                'string',
                'nullable',
            ],
            'pse_reference_1' => [
                'string',
                'nullable',
            ],
            'pse_reference_2' => [
                'string',
                'nullable',
            ],
            'pse_reference_3' => [
                'string',
                'nullable',
            ],
            'response_message_pol' => [
                'string',
                'nullable',
            ],
            'transaction_bank' => [
                'string',
                'nullable',
            ],
            'transaction' => [
                'string',
                'nullable',
            ],
            'payment_method_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
