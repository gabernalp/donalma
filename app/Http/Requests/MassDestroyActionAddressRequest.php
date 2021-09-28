<?php

namespace App\Http\Requests;

use App\Models\ActionAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActionAddressRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('action_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:action_addresses,id',
        ];
    }
}
