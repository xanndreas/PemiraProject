<?php

namespace App\Http\Requests;

use App\Prodi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProdiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('prodi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'             => [
                'required',
            ],
            'description'      => [
                'required',
            ],
            'jumlah_mahasiswa' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'jurusan_id'       => [
                'required',
                'integer',
            ],
        ];
    }
}