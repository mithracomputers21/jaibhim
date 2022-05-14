<?php

namespace App\Http\Requests;

use App\Models\Panchayat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePanchayatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('panchayat_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'block_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
