@extends('layouts.master')

@section('content')
    @if (session('success'))
            <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="row">
        <h1>Edit Data Siswa</h1>
        <div class="col-lg-12">
        <form action="/matakuliah/{{$matakuliah->id}}/update" method="POST">
            @csrf
             <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Mata Kuliah</label>
               <input name="matkul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$matakuliah->matkul}}">
             </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
     </form>
    </div>
</div>
@endsection
