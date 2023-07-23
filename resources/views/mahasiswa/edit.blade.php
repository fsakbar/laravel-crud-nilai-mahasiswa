@extends('layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <h1>Edit Data Siswa</h1>
        <div class="col-lg-12">
            <form action="/mahasiswa/{{ $mahasiswa->id }}/update" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                    <input name="nim" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $mahasiswa->nim }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $mahasiswa->nama }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                    <input name="program_studi" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $mahasiswa->program_studi }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No HP</label>
                    <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $mahasiswa->no_hp }}">
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Update</button>
        </div>
        </form>
    </div>
    </div>

    {{-- <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/mahasiswa/create" method="POST">
               @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">NIM</label>
                  <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Program Studi</label>
                    <input name="program_studi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label  for="exampleInputEmail1" class="form-label">No HP</label>
                    <input name="no_hp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>


        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    </div> --}}
@endsection
