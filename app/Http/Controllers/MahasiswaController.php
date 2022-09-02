<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $mahasiswa = Mahasiswa::all();
    return view('pages.mahasiswa.index', compact('mahasiswa'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.mahasiswa.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(MahasiswaRequest $request)
  {
    $data = $request->all();

    $user = new User();
    $user->email = $data['email'];
    $user->password = Hash::make($data['password']);
    $user->save();

    $user_id = User::where('email', $data['email'])->first()->id;
    $mahasiswa = new Mahasiswa();
    $mahasiswa->user_id = $user_id;
    $mahasiswa->nim = $data['nim'];
    $mahasiswa->nama = $data['nama'];
    $mahasiswa->alamat = $data['alamat'];
    $mahasiswa->jenis_kelamin = $data['jenis_kelamin'];
    $mahasiswa->tanggal_lahir = $data['tanggal_lahir'];
    $mahasiswa->save();

    return redirect()->route('dashboard.mahasiswa.index');

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Mahasiswa $mahasiswa)
  {
    return view('pages.mahasiswa.show', compact('mahasiswa'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
