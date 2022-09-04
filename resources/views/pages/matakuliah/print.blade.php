@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Data Mata Kuliah</h3>
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
      @forelse ($matakuliah as $matkul)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $matkul->kode_mk }}</td>
        <td>{{ $matkul->nama_mk }}</td>
        <td>{{ $matkul->sks }}</td>
        <td>{{ $matkul->semester }}</td>
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