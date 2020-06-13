<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProdiJurusanRequest;
use App\Http\Requests\StoreProdiJurusanRequest;
use App\Http\Requests\UpdateProdiJurusanRequest;
use App\ProdiJurusan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProdiJurusanController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('prodi_jurusan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProdiJurusan::query()->select(sprintf('%s.*', (new ProdiJurusan)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'prodi_jurusan_show';
                $editGate      = 'prodi_jurusan_edit';
                $deleteGate    = 'prodi_jurusan_delete';
                $crudRoutePart = 'prodi-jurusans';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('total_mahasiswa', function ($row) {
                return $row->total_mahasiswa ? $row->total_mahasiswa : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.prodiJurusans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('prodi_jurusan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prodiJurusans.create');
    }

    public function store(StoreProdiJurusanRequest $request)
    {
        $prodiJurusan = ProdiJurusan::create($request->all());

        return redirect()->route('admin.prodi-jurusans.index');
    }

    public function edit(ProdiJurusan $prodiJurusan)
    {
        abort_if(Gate::denies('prodi_jurusan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prodiJurusans.edit', compact('prodiJurusan'));
    }

    public function update(UpdateProdiJurusanRequest $request, ProdiJurusan $prodiJurusan)
    {
        $prodiJurusan->update($request->all());

        return redirect()->route('admin.prodi-jurusans.index');
    }

    public function show(ProdiJurusan $prodiJurusan)
    {
        abort_if(Gate::denies('prodi_jurusan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodiJurusan->load('jurusanProdis', 'jurusanCandidates');

        return view('admin.prodiJurusans.show', compact('prodiJurusan'));
    }

    public function destroy(ProdiJurusan $prodiJurusan)
    {
        abort_if(Gate::denies('prodi_jurusan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prodiJurusan->delete();

        return back();
    }

    public function massDestroy(MassDestroyProdiJurusanRequest $request)
    {
        ProdiJurusan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}