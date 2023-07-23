@extends('layouts.master')

@section('content1')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Mahasiswa</h3>
                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Data Mahasiswa
                                </button>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nilai</th>
                                            <th>Nama</th>
                                            <th>Program Studi</th>
                                            <th>No HP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_mahasiswa as $mahasiswa)
                                        <tr>
                                            <td><a href="#">{{$mahasiswa->nim}}</a></td>
                                            <td><a href="#">{{$mahasiswa->nama}}</a></td>
                                            <td><a href="#">{{$mahasiswa->program_studi}}</a></td>
                                            <td><a href="#">{{$mahasiswa->no_hp}}</a></td>
                                            <td>
                                                <a href="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/mahasiswa/{{$mahasiswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div>

@stop

@section('content')
    @if (session('success'))
            <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="row">
        <div class="col-6">
            <h1>Data Mahasiswa</h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data Mahasiswa
            </button>


        </div>

    <table class="table table-hover">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data_mahasiswa as $mahasiswa)
        <tr>
            <td><a href="/mahasiswa/{{$mahasiswa->id}}/profile" class="nav-link">{{$mahasiswa->nim}}</a></td>
            <td><a href="/mahasiswa/{{$mahasiswa->id}}/profile" class="nav-link">{{$mahasiswa->nama}}</a></td>
            <td><a href="/mahasiswa/{{$mahasiswa->id}}/profile" class="nav-link">{{$mahasiswa->program_studi}}</a></td>
            <td><a href="/mahasiswa/{{$mahasiswa->id}}/profile" class="nav-link">{{$mahasiswa->no_hp}}</a></td>
            <td>
                <a href="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="/mahasiswa/{{$mahasiswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus?')">Delete</a>
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
    </div>

@endsection
