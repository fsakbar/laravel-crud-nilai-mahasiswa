@extends('layouts.master')

@section('content')
    @if (session('success'))
            <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="row">
        <div class="col-6">
            <h1>Data Matakuliah</h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data Mata Kuliah
            </button>


        </div>

    <table class="table table-hover">
        <tr>
            <th>Matakuliah</th>

        </tr>
        @foreach ($data_matakuliah as $matakuliah)
        <tr>
            <td>{{$matakuliah->matkul}}</td>

        <td>
            <a href="/matakuliah/{{$matakuliah->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
            <a href="/matakuliah/{{$matakuliah->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus?')">Delete</a>
        </td>
        </tr>
        @endforeach
    </table>
    </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/matakuliah/create" method="POST">
               @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Matakuliah</label>
                  <input name="matkul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>



        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    </div>

@endsection
