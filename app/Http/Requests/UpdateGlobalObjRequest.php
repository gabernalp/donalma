<?php

namespace App\Http\Requests;

use App\Models\GlobalObj;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGlobalObjRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('global_obj_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
