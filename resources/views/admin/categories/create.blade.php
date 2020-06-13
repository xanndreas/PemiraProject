@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.category.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="open_date">{{ trans('cruds.category.fields.open_date') }}</label>
                <input class="form-control datetime {{ $errors->has('open_date') ? 'is-invalid' : '' }}" type="text" name="open_date" id="open_date" value="{{ old('open_date') }}" required>
                @if($errors->has('open_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('open_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.open_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="close_date">{{ trans('cruds.category.fields.close_date') }}</label>
                <input class="form-control datetime {{ $errors->has('close_date') ? 'is-invalid' : '' }}" type="text" name="close_date" id="close_date" value="{{ old('close_date') }}" required>
                @if($errors->has('close_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('close_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.close_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="candidates">{{ trans('cruds.category.fields.candidate') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('candidates') ? 'is-invalid' : '' }}" name="candidates[]" id="candidates" multiple required>
                    @foreach($candidates as $id => $candidate)
                        <option value="{{ $id }}" {{ in_array($id, old('candidates', [])) ? 'selected' : '' }}>{{ $candidate }}</option>
                    @endforeach
                </select>
                @if($errors->has('candidates'))
                    <div class="invalid-feedback">
                        {{ $errors->first('candidates') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.candidate_helper') }}</span>
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