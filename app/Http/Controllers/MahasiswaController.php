<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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
    $mahasiswa = Mahasiswa::all()->sortBy('nama');
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
    $existEmail = User::where('email', $request->email)->first();
    
    $data = $request->all();
    $username = explode('@', $data['email']);

    if(!$existEmail) {
      $this->validate($request, [
        'email' => 'unique:users',
        'password' => 'required|min:6',
      ]);
      $user = new User();
      $user->email = $data['email'];
      $user->password = Hash::make($data['password']);
      $user->username = $username[0];
      $user->save();  
    }


    $user_id = User::where('email', $data['email'])->first()->id;
    $mahasiswa = new Mahasiswa();
    $mahasiswa->user_id = $user_id;
    $mahasiswa->nim = $data['nim'];
    $mahasiswa->nama = $data['nama'];
    $mahasiswa->alamat = $data['alamat'];
    $mahasiswa->jenis_kelamin = $data['jenis_kelamin'];
    $mahasiswa->tanggal_lahir = $data['tanggal_lahir'];
    $mahasiswa->save();

    return redirect()->route('dashboard.mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Ditambahkan');

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
  public function edit(Mahasiswa $mahasiswa)
  {
    return view('pages.mahasiswa.edit', compact('mahasiswa'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
  {
    $data = $request->all();
    $user_id = User::find($mahasiswa->user_id);
    
    if($request->email != $user_id->email) {
      $username = explode('@', $data['email']);
      $user_id->username = $username[0];
      $this->validate($request, [
        'email' => 'unique:users',
        'username' => 'string'
      ]);
      $user_id->update([
        'email' => $data['email'],
        'username' => $user_id->username,
      ]);
    }
    
    if($request->password != '') {
      $this->validate($request, [
        'password' => 'required|min:6',
      ]);
      $user_id->update([
        'password' => Hash::make($data['password'])
      ]); 
    }

    if($request->nim != $mahasiswa->nim) {
      $this->validate($request, [
        'nim' => 'unique:mahasiswa'
      ]);
    }

    $mahasiswa->update([
      'nim' => $data['nim'],
      'nama' => $data['nama'],
      'alamat' => $data['alamat'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'tanggal_lahir' => $data['tanggal_lahir'],
    ]);

    return redirect()->route('dashboard.mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Mahasiswa $mahasiswa)
  {
    $user_id = User::find($mahasiswa->user_id);
    $user_id->delete();
    $mahasiswa->delete();
    return redirect()->route('dashboard.mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Dihapus');
  }

  public function print()
  {
    $mahasiswa = Mahasiswa::all();
    $pdf = Pdf::loadView('pages.mahasiswa.print', compact('mahasiswa'));
    return $pdf->download('Data-Mahasiswa.pdf');
  }

  public function print_detail(Mahasiswa $mahasiswa)
  {
    $nim = $mahasiswa->nim;
    $pdf = Pdf::loadView('pages.mahasiswa.print-detail', compact('mahasiswa'));
    return $pdf->download('Data-Mahasiswa-'. $nim .'.pdf');
  }
}
