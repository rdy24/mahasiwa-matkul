<?php

namespace App\Http\Controllers;

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
  public function store(Request $request)
  {
    $user = $this->validate($request, [
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
    ]);

    $user['password'] = Hash::make($user['password']);
    User::create($user);

    $mahasiswa = $this->validate($request, [
      'user_id' => 'unique:mahasiswa|unique:users',
      'nama' => 'required|string',
      'nim' => 'required|numeric|unique:mahasiswa',
      'tanggal_lahir' => 'required|date',
      'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
      'alamat' => 'required|string',
    ]);

    $user_id = User::where('email', $user['email'])->first()->id;
    $mahasiswa['user_id'] = $user_id;
    Mahasiswa::create($mahasiswa);
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
