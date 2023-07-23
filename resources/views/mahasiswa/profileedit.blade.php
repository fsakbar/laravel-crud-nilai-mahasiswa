@extends('layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <h1>Edit Data Nilai Siswa</h1>
        <div class="col-lg-12">

            <form action="/mahasiswa/{{ $mahasiswa->id }}/profile/update" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nilai</label>
                    <input name="matkul" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $mahasiswa->matkul->pivot->nilai }}">
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Update</button>
        </div>
        </form>

    </div>
    </div>
@endsection
