<?php

namespace App\Http\Requests;

use App\Models\Member;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_create');
    }

    public function rules()
    {
        return [
            'category' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'camp' => [
                'string',
                'nullable',
            ],
            'reference_number' => [
                'string',
                'nullable',
            ],
            'payment_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'amount' => [
                'string',
                'required',
            ],
            'remarks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
