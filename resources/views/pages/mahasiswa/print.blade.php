@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Data Mahasiswa</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($mahasiswa as $data)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nim }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->user->email ?? '' }}</td>
        <td>{{ $data->jenis_kelamin }}</td>
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