<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdiJurusanRequest;
use App\Http\Requests\UpdateProdiJurusanRequest;
use App\Http\Resources\Admin\ProdiJurusanResource;
use App\ProdiJurusan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdiJurusanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prodi_jurusan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProdiJurusanResource(ProdiJurusan::all());
    }

    public function store(StoreProdiJurusanRequest $request)
    {
        $prodiJurusan = ProdiJurusan::create($request->all());

        return (new ProdiJurusanResource($prodiJurusan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProdiJurusan $prodiJurusan)
    {
        abort_if(Gate::denies('prodi_jurusan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProdiJurusanResource($prodiJurusan);
    }

    public function update(UpdateProdiJurusanRequest $request, ProdiJurusan $prodiJurusan)
    {
        $prodiJurusan->update($request->all());

        return (new ProdiJurusanResource($prodiJurusan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProdiJurusan $prodiJurusan)
    {
        abort_if(Gate::denies('prodi_jurusan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodiJurusan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}