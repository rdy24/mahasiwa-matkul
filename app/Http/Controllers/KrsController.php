<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class KrsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $mahasiswa = Mahasiswa::all()->sortBy('nama');
    return view('pages.krs.index', compact('mahasiswa'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
    $mahasiswa = Mahasiswa::find($id);
    $matakuliah = MataKuliah::all()->sortBy('semester');
    return view('pages.krs.create', compact('mahasiswa', 'matakuliah'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id)
  {
    $mahasiswa = Mahasiswa::find($id);
    $this->validate($request, [
      'mata_kuliah_id' => ['required', Rule::unique('krs')->where('mahasiswa_id', $mahasiswa->id)],
    ], [
      'mata_kuliah_id.unique' => 'Mata kuliah sudah diambil oleh mahasiswa ini',
    ]);

    Krs::Create([
      'mahasiswa_id' => $mahasiswa->id,
      'mata_kuliah_id' => $request->mata_kuliah_id,
    ]);
    return redirect()->route('dashboard.krs.show', $mahasiswa->id)->with('success', 'Data KRS Berhasil Ditambahkan'); 
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
    return view('pages.krs.show', compact('mahasiswa','krs'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $krs = Krs::find($id);
    $matakuliah = MataKuliah::all()->sortBy('semester');
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
    $krs = Krs::find($id);
    if($request->mata_kuliah_id != $krs->mata_kuliah_id) {
      $this->validate($request, [
        'mata_kuliah_id' => ['required',  Rule::unique('krs')->where('mahasiswa_id', $krs->mahasiswa_id)],
      ], [
        'mata_kuliah_id.unique' => 'Mata Kuliah Sudah Diambil'
      ]);
    }
    $krs->update([
      'mahasiswa_id' => $krs->mahasiswa_id,
      'mata_kuliah_id' => $request->mata_kuliah_id,
    ]);
    return redirect()->route('dashboard.krs.show', $krs->mahasiswa_id)->with('success', 'Data KRS Berhasil Diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $krs = Krs::find($id);
    $krs->delete();
    return redirect()->route('dashboard.krs.show', $krs->mahasiswa_id)->with('success', 'Data KRS Berhasil Dihapus');
  }

  public function print($id)
  {
    $mahasiswa = Mahasiswa::find($id);
    $nim = $mahasiswa->nim;
    $krs = Krs::where('mahasiswa_id', $id)->get();
    $pdf = Pdf::loadView('pages.krs.print', compact('mahasiswa','krs'));
    return $pdf->download('Data-kRS-'. $nim .'.pdf');
  }
}
