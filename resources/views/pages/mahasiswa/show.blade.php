@extends('layouts.app')

@section('title')
Data Mahasiswa
@endsection

@section('content')
<div class="section-header">
  <h1>Detail Data Customer</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.') }}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="">Data Customer</a></div>
    <div class="breadcrumb-item">Detail Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body d-flex justify-content-between">
          <a href="" class=" btn btn-dark"><i
              class="fas fa-file-pdf" aria-hidden="true"></i> Cetak PDF</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection