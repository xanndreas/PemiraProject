@extends('layouts.admin')
@section('content')
@can('tahapan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tahapans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.tahapan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tahapan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tahapan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tahapan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.tahapan.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.tahapan.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.tahapan.fields.jenis_tahapan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tahapans as $key => $tahapan)
                        <tr data-entry-id="{{ $tahapan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tahapan->id ?? '' }}
                            </td>
                            <td>
                                {{ $tahapan->tanggal ?? '' }}
                            </td>
                            <td>
                                {{ $tahapan->description ?? '' }}
                            </td>
                            <td>
                                {{ $tahapan->jenis_tahapan ?? '' }}
                            </td>
                            <td>
                                @can('tahapan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tahapans.show', $tahapan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tahapan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tahapans.edit', $tahapan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tahapan_delete')
                                    <form action="{{ route('admin.tahapans.destroy', $tahapan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('tahapan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tahapans.massDestroy') }}",
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
  let table = $('.datatable-Tahapan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection