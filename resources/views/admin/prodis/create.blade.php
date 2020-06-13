@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.prodi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.prodis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.prodi.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prodi.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.prodi.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prodi.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlah_mahasiswa">{{ trans('cruds.prodi.fields.jumlah_mahasiswa') }}</label>
                <input class="form-control {{ $errors->has('jumlah_mahasiswa') ? 'is-invalid' : '' }}" type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" value="{{ old('jumlah_mahasiswa', '') }}" step="1" required>
                @if($errors->has('jumlah_mahasiswa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah_mahasiswa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prodi.fields.jumlah_mahasiswa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jurusan_id">{{ trans('cruds.prodi.fields.jurusan') }}</label>
                <select class="form-control select2 {{ $errors->has('jurusan') ? 'is-invalid' : '' }}" name="jurusan_id" id="jurusan_id" required>
                    @foreach($jurusans as $id => $jurusan)
                        <option value="{{ $id }}" {{ old('jurusan_id') == $id ? 'selected' : '' }}>{{ $jurusan }}</option>
                    @endforeach
                </select>
                @if($errors->has('jurusan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jurusan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prodi.fields.jurusan_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection