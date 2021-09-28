<?php

namespace App\Http\Requests;

use App\Models\GlobalObj;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGlobalObjRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('global_obj_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:global_objs,id',
        ];
    }
}
