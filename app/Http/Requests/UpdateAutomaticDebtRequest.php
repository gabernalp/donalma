<?php

namespace App\Http\Requests;

use App\Models\AutomaticDebt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAutomaticDebtRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('automatic_debt_edit');
    }

    public function rules()
    {
        return [];
    }
}
