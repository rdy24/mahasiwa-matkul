@extends('layouts.app-print')

@section('content')
<div class="container">
  <h3 class="text-center my-5">Data Mahasiswa {{ $mahasiswa->nama }}</h3>
  <table class="table table-bordered">
    <tr>
      <th>Nim</th>
      <td>{{ $mahasiswa->nim }}</td>
    </tr>
    <tr>
      <th>Nama</th>
      <td>{{ $mahasiswa->nama }}</td>
    </tr>
    <tr>
      <th>Jenis Kelamin</th>
      <td>{{ $mahasiswa->jenis_kelamin }}</td>
    </tr>
    <tr>
      <th>email</th>
      <td>{{ $mahasiswa->user->email }}</td>
    </tr>
    <tr>
      <th>Tanggal Lahir</th>
      <td>{{ date('d-m-Y', strtotime($mahasiswa->tanggal_lahir)) }}</td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td>{{ $mahasiswa->alamat }}</td>
    </tr>
  </table>
</div>
@endsection