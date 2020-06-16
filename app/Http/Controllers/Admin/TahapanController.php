<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTahapanRequest;
use App\Http\Requests\StoreTahapanRequest;
use App\Http\Requests\UpdateTahapanRequest;
use App\Tahapan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TahapanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tahapan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahapans = Tahapan::all();

        return view('admin.tahapans.index', compact('tahapans'));
    }

    public function create()
    {
        abort_if(Gate::denies('tahapan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tahapans.create');
    }

    public function store(StoreTahapanRequest $request)
    {
        $tahapan = Tahapan::create($request->all());

        return redirect()->route('admin.tahapans.index');
    }

    public function edit(Tahapan $tahapan)
    {
        abort_if(Gate::denies('tahapan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tahapans.edit', compact('tahapan'));
    }

    public function update(UpdateTahapanRequest $request, Tahapan $tahapan)
    {
        $tahapan->update($request->all());

        return redirect()->route('admin.tahapans.index');
    }

    public function show(Tahapan $tahapan)
    {
        abort_if(Gate::denies('tahapan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tahapans.show', compact('tahapan'));
    }

    public function destroy(Tahapan $tahapan)
    {
        abort_if(Gate::denies('tahapan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tahapan->delete();

        return back();
    }

    public function massDestroy(MassDestroyTahapanRequest $request)
    {
        Tahapan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}