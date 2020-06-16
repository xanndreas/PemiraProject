<?php

namespace App\Http\Requests;

use App\Tahapan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTahapanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tahapan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'tanggal'     => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'description' => [
                'required',
            ],
        ];
    }
}