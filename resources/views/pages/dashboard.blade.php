@extends('layouts.app')

@section('title')
Dashboard | {{ config('app.name') }}
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Mahasiswa</h4>
          </div>
          <div class="card-body">
            {{ $mahasiswa }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-book"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Mata Kuliah</h4>
          </div>
          <div class="card-body">
            {{ $matakuliah }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Admin</h4>
          </div>
          <div class="card-body">
            {{ $admin }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection