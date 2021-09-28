<?php

namespace App\Http\Requests;

use App\Models\Donation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDonationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('donation_edit');
    }

    public function rules()
    {
        return [];
    }
}
