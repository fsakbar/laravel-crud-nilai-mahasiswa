<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    //
    public function index()
    {
        $data_matakuliah = \App\Models\Matkul::all();
        return view('matakuliah.index', ['data_matakuliah' => $data_matakuliah]);
    }

    public function create(Request $request)
    {
        \App\Models\Matkul::create($request->all());
        return redirect('/matakuliah')->with('success', 'data berhasil diinput');
    }

    public function edit($id)
    {
        $matakuliah = \App\Models\Matkul::find($id);

        return view('matakuliah/edit', ['matakuliah' => $matakuliah]);
    }

    public function update(Request $request, $id)
    {
        $matakuliah = \App\Models\Matkul::find($id);
        $matakuliah->update($request->all());
        return redirect('/matakuliah')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $matakuliah = \App\Models\Matkul::find($id);
        $matakuliah->delete($matakuliah);
        return redirect('/matakuliah')->with('success', 'Data Berhasil Dihapus');
    }
}
