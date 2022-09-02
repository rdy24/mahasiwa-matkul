<?php

namespace App\Http\Controllers;

use App\Http\Requests\MataKuliahRequest;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $matakuliah = MataKuliah::all();
    return view('pages.matakuliah.index', compact('matakuliah'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.matakuliah.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(MataKuliahRequest $request)
  {
    $this->validate($request, [
      'kode_mk' => 'required|string|max:6|unique:mata_kuliah',
    ]);

    $data = $request->all();
    MataKuliah::create($data);
    return redirect()->route('dashboard.matkul.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(MataKuliah $matkul)
  {
    return view('pages.matakuliah.edit', compact('matkul'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(MataKuliahRequest $request, MataKuliah $matkul)
  {
    if($request->kode_mk != $matkul->kode_mk) {
      $this->validate($request, [
        'kode_mk' => 'required|string|max:6|unique:mata_kuliah',
      ]);
    }

    $data = $request->all();
    $matkul->update($data);
    return redirect()->route('dashboard.matkul.index');
  }

  /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function destroy(MataKuliah $matkul)
  {
    $matkul->delete();
    return redirect()->route('dashboard.matkul.index');
  }
}
