<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Matkul;

class MahasiswaController extends Controller
{
    //
    public function index(){
        $data_mahasiswa = \App\Models\Mahasiswa::all();
        return view('mahasiswa.index', ['data_mahasiswa' => $data_mahasiswa]);
    }

    public function create(Request $request){
        \App\Models\Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('success', 'data berhasil diinput');

    }

    public function edit($id){
        $mahasiswa = \App\Models\Mahasiswa::find($id);

        return view ('mahasiswa/edit', ['mahasiswa'=> $mahasiswa]);

    }

    public function update(Request $request, $id){
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        return redirect('/mahasiswa')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete ($id){
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        $mahasiswa->delete($mahasiswa);
        return redirect('/mahasiswa')->with('success', 'Data Berhasil Dihapus');
    }

    public function profile($id){
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        $mata_kuliah = \App\Models\Matkul::all();
        return view ('mahasiswa.profile', ['mahasiswa'=> $mahasiswa, 'mata_kuliah' => $mata_kuliah]);
    }


    // public function profileedit($id){
    //     $mahasiswa = \App\Models\Mahasiswa::find($id);
    //     // $mahasiswa->matkul()->updateExistingPivot($request)
    //     $mata_kuliah = \App\Models\Matkul::all();

    //     return view ('mahasiswa.profileedit', ['mahasiswa'=> $mahasiswa, 'mata_kuliah' => $mata_kuliah]);
    // }

    // public function profileupdate(){

    // }

    // public function profiledelete($id_mahasiswa, $id_matkul){
    //     $mahasiswa = \App\Models\Mahasiswa::find($id_mahasiswa);
    //     $mahasiswa -> matkul()->detach($id_matkul);
    //     return redirect()->back()->with('success', 'Data Nilai Berhasil Dihapus');
    // }

    public function addnilai(Request $request, $id_mahasiswa){
        // dd($request->all());
        $mahasiswa = \App\Models\Mahasiswa::find($id_mahasiswa);
        if($mahasiswa->matkul()->where('matkul_id', $request->matkul)->exists()){
            return redirect('mahasiswa/'.$id_mahasiswa.'/profile')->with('error', 'Data Mata Pelajaran Sudah Ada');
        }

        $mahasiswa->matkul()->attach($request->matkul, ['nilai' => $request->nilai]);
        return redirect('mahasiswa/'.$id_mahasiswa.'/profile')->with('success', 'Data Berhasil Dimasukan');
    }


}

