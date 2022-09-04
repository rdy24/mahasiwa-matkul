@extends('layouts.app')

@section('title')
Tambah Data KRS
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/select2/dist/css/select2.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Tambah Data KRS</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data KRS</a></div>
    <div class="breadcrumb-item active">Tambah Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.krs.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="mahasiswa_id">Mahasiswa</label>
              <select name="mahasiswa_id" required class="form-control select2">
                @foreach ($mahasiswa as $data)
                <option value="{{ $data->id }}" {{ old('mahasiswa_id')==$data->id ? 'selected' : '' }}>
                  {{ $data->nim }} - {{ $data->nama }}
                </option>
                @endforeach
              </select>
              @error('mahasiswa_id')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="mata_kuliah_id">Mata Kuliah</label>
              <select name="mata_kuliah_id" required class="form-control select2">
                @foreach ($matakuliah as $matkul)
                <option value="{{ $matkul->id }}" {{ old('mata_kuliah_id')==$matkul->id ? 'selected' : '' }}>
                  {{ $matkul->kode_mk }} - {{ $matkul->nama_mk }} - {{ $matkul->sks }} sks - Semester {{ $matkul->semester }}
                </option>
                @endforeach
              </select>
              @error('mata_kuliah_id')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
<script src={{ asset("assets/module/select2/dist/js/select2.full.min.js") }}></script>
@endpush
