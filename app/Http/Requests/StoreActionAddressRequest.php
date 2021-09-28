<?php

namespace App\Http\Requests;

use App\Models\ActionAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreActionAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('action_address_create');
    }

    public function rules()
    {
        return [
            'action_id' => [
                'required',
                'integer',
            ],
            'address' => [
                'string',
                'required',
            ],
            'country_id' => [
                'required',
                'integer',
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
            'comments' => [
                'string',
                'nullable',
            ],
        ];
    }
}
