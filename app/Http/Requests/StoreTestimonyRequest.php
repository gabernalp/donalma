<?php

namespace App\Http\Requests;

use App\Models\Testimony;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTestimonyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('testimony_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'comments' => [
                'string',
                'nullable',
            ],
        ];
    }
}
