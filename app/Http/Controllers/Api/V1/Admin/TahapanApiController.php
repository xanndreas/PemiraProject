<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTahapanRequest;
use App\Http\Requests\UpdateTahapanRequest;
use App\Http\Resources\Admin\TahapanResource;
use App\Tahapan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TahapanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tahapan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TahapanResource(Tahapan::all());
    }

    public function store(StoreTahapanRequest $request)
    {
        $tahapan = Tahapan::create($request->all());

        return (new TahapanResource($tahapan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tahapan $tahapan)
    {
        abort_if(Gate::denies('tahapan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TahapanResource($tahapan);
    }

    public function update(UpdateTahapanRequest $request, Tahapan $tahapan)
    {
        $tahapan->update($request->all());

        return (new TahapanResource($tahapan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tahapan $tahapan)
    {
        abort_if(Gate::denies('tahapan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahapan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}