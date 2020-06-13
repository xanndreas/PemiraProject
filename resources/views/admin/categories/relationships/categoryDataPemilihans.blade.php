@can('data_pemilihan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.data-pemilihans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dataPemilihan.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.dataPemilihan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-categoryDataPemilihans">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dataPemilihan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPemilihan.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.nim') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.kelas') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPemilihan.fields.candidate') }}
                        </th>
                        <th>
                            {{ trans('cruds.dataPemilihan.fields.category') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPemilihans as $key => $dataPemilihan)
                        <tr data-entry-id="{{ $dataPemilihan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dataPemilihan->id ?? '' }}
                            </td>
                            <td>
                                {{ $dataPemilihan->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $dataPemilihan->user->nim ?? '' }}
                            </td>
                            <td>
                                {{ $dataPemilihan->user->kelas ?? '' }}
                            </td>
                            <td>
                                {{ $dataPemilihan->candidate->name ?? '' }}
                            </td>
                            <td>
                                {{ $dataPemilihan->category->name ?? '' }}
                            </td>
                            <td>
                                @can('data_pemilihan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.data-pemilihans.show', $dataPemilihan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('data_pemilihan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.data-pemilihans.edit', $dataPemilihan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('data_pemilihan_delete')
                                    <form action="{{ route('admin.data-pemilihans.destroy', $dataPemilihan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('data_pemilihan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-pemilihans.massDestroy') }}",
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
  let table = $('.datatable-categoryDataPemilihans:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection