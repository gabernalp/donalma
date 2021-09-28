<?php

namespace App\Http\Requests;

use App\Models\AutomaticDebt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAutomaticDebtRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('automatic_debt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:automatic_debts,id',
        ];
    }
}
