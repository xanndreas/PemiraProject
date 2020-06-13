<?php

namespace App\Http\Requests;

use App\ProdiJurusan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProdiJurusanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('prodi_jurusan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:prodi_jurusans,id',
        ];
    }
}