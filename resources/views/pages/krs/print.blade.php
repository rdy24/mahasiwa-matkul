@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Data KRS {{ $mahasiswa->nama }}</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Kode MK</th>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Semester</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($krs as $data)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->mata_kuliah->kode_mk ?? '' }}</td>
        <td>{{ $data->mata_kuliah->nama_mk ?? '' }}</td>
        <td>{{ $data->mata_kuliah->sks ?? '' }}</td>
        <td>{{ $data->mata_kuliah->semester ?? '' }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection