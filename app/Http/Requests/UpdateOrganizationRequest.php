<?php

namespace App\Http\Requests;

use App\Models\Organization;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrganizationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organization_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'organization_types.*' => [
                'integer',
            ],
            'organization_types' => [
                'required',
                'array',
            ],
            'nit' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:organizations,nit,' . request()->route('organization')->id,
            ],
            'legal_representant' => [
                'string',
                'required',
            ],
            'dcoumenttype_id' => [
                'required',
                'integer',
            ],
            'document' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cargo' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'department_id' => [
                'required',
                'integer',
            ],
            'city_id' => [
                'required',
                'integer',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'main_phone_ext' => [
                'string',
                'nullable',
            ],
            'postal_code' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
            ],
            'finnancial_contact' => [
                'string',
                'nullable',
            ],
            'finnancial_contact_phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'finnancial_contact_ext' => [
                'string',
                'nullable',
            ],
            'contracting_contact' => [
                'string',
                'nullable',
            ],
            'contracting_contact_phone' => [
                'string',
                'nullable',
            ],
            'contracting_contact_ext' => [
                'string',
                'nullable',
            ],
            'electronic_invoice_contact' => [
                'string',
                'nullable',
            ],
            'electronic_invoice_phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'electronic_invoice_ext' => [
                'string',
                'nullable',
            ],
            'cash_banks_contact' => [
                'string',
                'nullable',
            ],
            'cash_banks_phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cash_banks_ext' => [
                'string',
                'nullable',
            ],
            'limit_day_to_invoice' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'local_tax_ammount' => [
                'numeric',
            ],
            'big_taxpayer_resolution' => [
                'string',
                'nullable',
            ],
            'seft_taxreteiner_resolution' => [
                'string',
                'nullable',
            ],
            'bc_file' => [
                'string',
                'nullable',
            ],
            'long_description' => [
                'string',
                'nullable',
            ],
            'webpage' => [
                'string',
                'nullable',
            ],
            'tags' => [
                'string',
                'nullable',
            ],
        ];
    }
}
