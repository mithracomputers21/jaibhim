<?php

namespace App\Http\Requests;

use App\Models\Panchayat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPanchayatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('panchayat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:panchayats,id',
        ];
    }
}
