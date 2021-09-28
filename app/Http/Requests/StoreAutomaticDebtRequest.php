<?php

namespace App\Http\Requests;

use App\Models\AutomaticDebt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAutomaticDebtRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('automatic_debt_create');
    }

    public function rules()
    {
        return [];
    }
}
