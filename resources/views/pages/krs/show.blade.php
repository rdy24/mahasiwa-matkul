@extends('layouts.app')

@section('title')
Data KRS 
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/datatables.net-select-bs4/css/select.bootstrap4.min.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Data KRS {{ $mahasiswa->nama }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
    <div class="breadcrumb-item">Data KRS</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body d-flex justify-content-between">
          <a href="{{ route('dashboard.krs.index') }}" class="btn btn-info"><i class="fas fa-arrow-left" aria-hidden="true"></i> Back</a>
          <a href="{{ route('dashboard.mahasiswa.print') }}" class="btn btn-dark"><i class="fas fa-file-pdf" aria-hidden="true"></i> Cetak PDF</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode MK</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Semester</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($krs as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->mata_kuliah->kode_mk }}</td>
                  <td>{{ $data->mata_kuliah->nama_mk }}</td>
                  <td>{{ $data->mata_kuliah->sks }}</td>
                  <td>{{ $data->mata_kuliah->semester }}</td>
                  <td>
                    <a href="{{ route('dashboard.krs.edit', $data->mata_kuliah->id) }}" class="btn btn-warning"><i
                        class="fa fa-pen" aria-hidden="true"></i></a>
                    <form action="{{ route('dashboard.mahasiswa.destroy', $data->id) }}" method="POST"
                      class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger btn-delete" data-toggle="tooltip" title='Delete'><i
                          class="fas fa-trash" aria-hidden="true"></i></button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js-libraries')
<script src={{ asset("assets/module/datatables/media/js/jquery.dataTables.min.js") }}></script>
<script src={{ asset("assets/module/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("assets/module/datatables.net-select-bs4/js/select.bootstrap4.min.js") }}></script>
<script src={{ asset("assets/module/sweetalert/dist/sweetalert.min.js") }}></script>
@endpush

@push('js-page')
<script src={{ asset("assets/js/page/modules-datatables.js") }}></script>
@endpush

@push('alert-js')
<script>
  $(".btn-delete").click(function(e) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    e.preventDefault();
    swal({
      title: 'Yakin ingin menghapus data?',
      text: 'Data akan dihapus secara permanen!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
      } else {
        swal('Proses Hapus dibatalkan');
      }
    });
  });
</script>
@endpush