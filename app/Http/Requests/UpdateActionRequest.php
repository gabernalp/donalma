<?php

namespace App\Http\Requests;

use App\Models\Action;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('action_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
