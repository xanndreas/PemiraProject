<?php

namespace App\Http\Controllers\Admin;

use App\Candidate;
use App\Category;
use App\DataPemilihan;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDataPemilihanRequest;
use App\Http\Requests\StoreDataPemilihanRequest;
use App\Http\Requests\UpdateDataPemilihanRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DataPemilihanController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('data_pemilihan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DataPemilihan::with(['user', 'candidate', 'category'])->select(sprintf('%s.*', (new DataPemilihan)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'data_pemilihan_show';
                $editGate      = 'data_pemilihan_edit';
                $deleteGate    = 'data_pemilihan_delete';
                $crudRoutePart = 'data-pemilihans';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('user.nim', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->nim) : '';
            });
            $table->editColumn('user.kelas', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->kelas) : '';
            });
            $table->addColumn('candidate_name', function ($row) {
                return $row->candidate ? $row->candidate->name : '';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'candidate', 'category']);

            return $table->make(true);
        }

        return view('admin.dataPemilihans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_pemilihan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $candidates = Candidate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dataPemilihans.create', compact('users', 'candidates', 'categories'));
    }

    public function store(StoreDataPemilihanRequest $request)
    {
        $dataPemilihan = DataPemilihan::create($request->all());

        return redirect()->route('admin.data-pemilihans.index');
    }

    public function edit(DataPemilihan $dataPemilihan)
    {
        abort_if(Gate::denies('data_pemilihan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $candidates = Candidate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dataPemilihan->load('user', 'candidate', 'category');

        return view('admin.dataPemilihans.edit', compact('users', 'candidates', 'categories', 'dataPemilihan'));
    }

    public function update(UpdateDataPemilihanRequest $request, DataPemilihan $dataPemilihan)
    {
        $dataPemilihan->update($request->all());

        return redirect()->route('admin.data-pemilihans.index');
    }

    public function show(DataPemilihan $dataPemilihan)
    {
        abort_if(Gate::denies('data_pemilihan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPemilihan->load('user', 'candidate', 'category');

        return view('admin.dataPemilihans.show', compact('dataPemilihan'));
    }

    public function destroy(DataPemilihan $dataPemilihan)
    {
        abort_if(Gate::denies('data_pemilihan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataPemilihan->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataPemilihanRequest $request)
    {
        DataPemilihan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}