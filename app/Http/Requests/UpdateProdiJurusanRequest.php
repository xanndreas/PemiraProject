<?php

namespace App\Http\Requests;

use App\ProdiJurusan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProdiJurusanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('prodi_jurusan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}