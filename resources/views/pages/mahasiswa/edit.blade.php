@extends('layouts.app')

@section('title')
Edit Data Mahasiswa
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Edit Data Mahasiswa</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Mahasiswa</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nim">Nim</label>
              <input type="text" class="form-control" id="nim" name="nim" required
                value="{{ old('nim', $mahasiswa->nim) }}">
              @error('nim')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required
                value="{{ old('nama', $mahasiswa->nama) }}">
              @error('nama')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">email</label>
              <input type="text" class="form-control" id="email" name="email" required
                value="{{ old('email', $mahasiswa->user->email) }}">
              @error('email')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">password</label>
              <input type="password" class="form-control" id="password" name="password"
                value="{{ old('password') }}">
              @error('password')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" {{
                  old('jenis_kelamin', $mahasiswa->jenis_kelamin)=='Laki-laki' ? 'checked' : '' }}>
                <label class="form-check-label" for="jenis_kelamin">
                  Laki-laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Perempuan" {{
                  old('jenis_kelamin', $mahasiswa->jenis_kelamin)=='Perempuan' ? 'checked' : '' }}>
                <label class="form-check-label" for="jenis_kelamin1">
                  Perempuan
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="text" class="form-control datepicker" id="tanggal_lahir" name="tanggal_lahir"
                required value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}">
              @error('tanggal_lahir')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required
                value="{{ old('alamat', $mahasiswa->alamat) }}">
              @error('alamat')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js-libraries')
<script src={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.js") }}></script>
<script src={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js") }}></script>
@endpush
