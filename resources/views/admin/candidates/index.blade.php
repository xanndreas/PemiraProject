@extends('layouts.admin')
@section('content')
@can('candidate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.candidates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.candidate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.candidate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Candidate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.candidate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidate.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidate.fields.jurusan') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidate.fields.organization') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidate.fields.sebagai') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidate.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.candidate.fields.link') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidates as $key => $candidate)
                        <tr data-entry-id="{{ $candidate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $candidate->id ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->jurusan->name ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->organization ?? '' }}
                            </td>
                            <td>
                                {{ $candidate->sebagai ?? '' }}
                            </td>
                            <td>
                                @if($candidate->photo)
                                    <a href="{{ $candidate->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $candidate->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $candidate->link ?? '' }}
                            </td>
                            <td>
                                @can('candidate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.candidates.show', $candidate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('candidate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.candidates.edit', $candidate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('candidate_delete')
                                    <form action="{{ route('admin.candidates.destroy', $candidate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('candidate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.candidates.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Candidate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection