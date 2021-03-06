<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'document' => [
                'string',
                'required',
                'unique:users',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'password' => [
                'required',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
