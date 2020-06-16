@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tahapan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tahapans.update", [$tahapan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.tahapan.fields.tanggal') }}</label>
                <input class="form-control datetime {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $tahapan->tanggal) }}" required>
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tahapan.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.tahapan.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', $tahapan->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tahapan.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jenis_tahapan">{{ trans('cruds.tahapan.fields.jenis_tahapan') }}</label>
                <input class="form-control {{ $errors->has('jenis_tahapan') ? 'is-invalid' : '' }}" type="text" name="jenis_tahapan" id="jenis_tahapan" value="{{ old('jenis_tahapan', $tahapan->jenis_tahapan) }}">
                @if($errors->has('jenis_tahapan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jenis_tahapan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tahapan.fields.jenis_tahapan_helper') }}</span>
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