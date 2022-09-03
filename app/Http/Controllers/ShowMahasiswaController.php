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

    $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
    return view('pages.mahasiswa.show-mahasiswa', compact('mahasiswa'));
  }
}
