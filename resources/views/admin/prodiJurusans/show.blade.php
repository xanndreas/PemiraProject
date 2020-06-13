@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.prodiJurusan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prodi-jurusans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.prodiJurusan.fields.id') }}
                        </th>
                        <td>
                            {{ $prodiJurusan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prodiJurusan.fields.name') }}
                        </th>
                        <td>
                            {{ $prodiJurusan->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prodiJurusan.fields.description') }}
                        </th>
                        <td>
                            {{ $prodiJurusan->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prodiJurusan.fields.total_mahasiswa') }}
                        </th>
                        <td>
                            {{ $prodiJurusan->total_mahasiswa }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prodi-jurusans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#jurusan_prodis" role="tab" data-toggle="tab">
                {{ trans('cruds.prodi.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#jurusan_candidates" role="tab" data-toggle="tab">
                {{ trans('cruds.candidate.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="jurusan_prodis">
            @includeIf('admin.prodiJurusans.relationships.jurusanProdis', ['prodis' => $prodiJurusan->jurusanProdis])
        </div>
        <div class="tab-pane" role="tabpanel" id="jurusan_candidates">
            @includeIf('admin.prodiJurusans.relationships.jurusanCandidates', ['candidates' => $prodiJurusan->jurusanCandidates])
        </div>
    </div>
</div>

@endsection