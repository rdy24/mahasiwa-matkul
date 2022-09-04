<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $mahasiswa = Mahasiswa::count();
    $matakuliah = MataKuliah::count();
    $admin = User::where('role', 'admin')->count();
    return view('pages.dashboard', compact('mahasiswa', 'matakuliah', 'admin'));
  }
}
