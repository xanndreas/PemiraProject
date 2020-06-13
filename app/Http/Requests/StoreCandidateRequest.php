<?php

namespace App\Http\Requests;

use App\Candidate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCandidateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('candidate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'         => [
                'required',
            ],
            'jurusan_id'   => [
                'required',
                'integer',
            ],
            'organization' => [
                'required',
            ],
            'visimisi'     => [
                'required',
            ],
            'photo'        => [
                'required',
            ],
            'link'         => [
                'required',
            ],
        ];
    }
}