@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tahapan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tahapans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tahapan.fields.id') }}
                        </th>
                        <td>
                            {{ $tahapan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tahapan.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $tahapan->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tahapan.fields.description') }}
                        </th>
                        <td>
                            {{ $tahapan->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tahapan.fields.jenis_tahapan') }}
                        </th>
                        <td>
                            {{ $tahapan->jenis_tahapan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tahapans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection