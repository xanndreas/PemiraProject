@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.candidate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.candidates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.id') }}
                        </th>
                        <td>
                            {{ $candidate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.name') }}
                        </th>
                        <td>
                            {{ $candidate->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.jurusan') }}
                        </th>
                        <td>
                            {{ $candidate->jurusan->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.organization') }}
                        </th>
                        <td>
                            {{ $candidate->organization }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.sebagai') }}
                        </th>
                        <td>
                            {{ $candidate->sebagai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.visimisi') }}
                        </th>
                        <td>
                            {!! $candidate->visimisi !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.photo') }}
                        </th>
                        <td>
                            @if($candidate->photo)
                                <a href="{{ $candidate->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $candidate->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.candidate.fields.link') }}
                        </th>
                        <td>
                            {{ $candidate->link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.candidates.index') }}">
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
            <a class="nav-link" href="#candidate_categories" role="tab" data-toggle="tab">
                {{ trans('cruds.category.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="candidate_categories">
            @includeIf('admin.candidates.relationships.candidateCategories', ['categories' => $candidate->candidateCategories])
        </div>
    </div>
</div>

@endsection