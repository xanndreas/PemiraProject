@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.prodi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.prodi.fields.id') }}
                        </th>
                        <td>
                            {{ $prodi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prodi.fields.name') }}
                        </th>
                        <td>
                            {{ $prodi->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prodi.fields.description') }}
                        </th>
                        <td>
                            {{ $prodi->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prodi.fields.jumlah_mahasiswa') }}
                        </th>
                        <td>
                            {{ $prodi->jumlah_mahasiswa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prodi.fields.jurusan') }}
                        </th>
                        <td>
                            {{ $prodi->jurusan->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prodis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection