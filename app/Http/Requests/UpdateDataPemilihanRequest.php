<?php

namespace App\Http\Requests;

use App\DataPemilihan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDataPemilihanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('data_pemilihan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'user_id'      => [
                'required',
                'integer',
            ],
            'candidate_id' => [
                'required',
                'integer',
            ],
            'category_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}