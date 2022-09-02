@extends('layouts.app')

@section('title')
Edit Data Mata Kuliah
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Edit Data Mata Kuliah</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Mata Kuliah</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.matkul.update', $matkul->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="kode_mk">Kode MK</label>
              <input type="text" class="form-control" id="kode_mk" name="kode_mk" required
                value="{{ old('kode_mk', $matkul->kode_mk) }}">
              @error('kode_mk')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_mk">Mata Kuliah</label>
              <input type="text" class="form-control" id="nama_mk" name="nama_mk" required
                value="{{ old('nama_mk', $matkul->nama_mk) }}">
              @error('nama_mk')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="sks">SKS</label>
              <select name="sks" required class="form-control select2">
                @for($i=2; $i<=4; $i++)
                <option value="{{ $i }}" {{ old('sks', $matkul->sks)==$i ? 'selected' : '' }}>
                  {{ $i }}
                </option>
                @endfor
              </select>
            </div>
            <div class="form-group">
              <label for="semester">Semester</label>
              <select name="semester" required class="form-control select2">
                @for($i=1; $i<=8; $i++)
                <option value="{{ $i }}" {{ old('semester', $matkul->semester)==$i ? 'selected' : '' }}>
                  {{ $i }}
                </option>
                @endfor
              </select>
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
