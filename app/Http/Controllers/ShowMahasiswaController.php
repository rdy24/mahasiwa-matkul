<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowMahasiswaController extends Controller
{
  public function show()
  {
    $this->authorize('is_mahasiswa');

    $mahasiswa = Mahasiswa::find(Auth::user()->mahasiswa->id);
    return view('pages.mahasiswa.show-mahasiswa', compact('mahasiswa'));
  }
}
