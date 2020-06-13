<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DataPemilihan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataPemilihanRequest;
use App\Http\Requests\UpdateDataPemilihanRequest;
use App\Http\Resources\Admin\DataPemilihanResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataPemilihanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('data_pemilihan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataPemilihanResource(DataPemilihan::with(['user', 'candidate', 'category'])->get());
    }

    public function store(StoreDataPemilihanRequest $request)
    {
        $dataPemilihan = DataPemilihan::create($request->all());

        return (new DataPemilihanResource($dataPemilihan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DataPemilihan $dataPemilihan)
    {
        abort_if(Gate::denies('data_pemilihan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DataPemilihanResource($dataPemilihan->load(['user', 'candidate', 'category']));
    }

    public function update(UpdateDataPemilihanRequest $request, DataPemilihan $dataPemilihan)
    {
        $dataPemilihan->update($request->all());

        return (new DataPemilihanResource($dataPemilihan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DataPemilihan $dataPemilihan)
    {
        abort_if(Gate::denies('data_pemilihan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPemilihan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}