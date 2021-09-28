<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'start_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'featured' => [
                'string',
                'nullable',
            ],
            'file' => [
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
