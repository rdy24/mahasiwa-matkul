@extends('layouts.app')

@section('title')
Data {{ $mahasiswa->nama }}
@endsection

@section('content')
<div class="section-header">
  <h1>Data {{ $mahasiswa->nama }}</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
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