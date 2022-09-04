<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KrsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $mahasiswa = Mahasiswa::all();
    return view('pages.krs.index', compact('mahasiswa'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $mahasiswa = Mahasiswa::all();
    $matakuliah = MataKuliah::all()->sortBy('semester');
    return view('pages.krs.create', compact('mahasiswa', 'matakuliah'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'mahasiswa_id' => ['required', Rule::unique('krs')->where('mata_kuliah_id', $request->mata_kuliah_id)],
      'mata_kuliah_id' => ['required', Rule::unique('krs')->where('mahasiswa_id', $request->mahasiswa_id)],
    ]);

    $data = $request->all();
    Krs::Create($data);
    return redirect()->route('dashboard.krs.index')->with('success', 'Data KRS Berhasil Ditambahkan'); 
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $mahasiswa = Mahasiswa::find($id);
    $krs = Krs::where('mahasiswa_id', $id)->get();
    return view('pages.krs.show', compact('mahasiswa', 'krs'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $krs = Krs::where('mata_kuliah_id', $id)->first();
    $matakuliah = MataKuliah::all()->sortBy('semester');
    dd($krs);
    return view('pages.krs.edit', compact('matakuliah', 'krs'));
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
