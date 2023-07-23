@extends('layouts.master')


@section('header')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet" />
@stop



@section('content')
    <div class="profile-detail">
        <div class="profile-info">
            <h4 class="heading">Detail Data Diri Mahasiswa</h4>
            <ul class="list-unstyled">
                <li>NIM: {{ $mahasiswa->nim }}</li>
                <li>Nama: {{ $mahasiswa->nama }}</li>
                <li>Program Studi: {{ $mahasiswa->program_studi }}</li>
                <li>No Telepon: {{ $mahasiswa->no_hp }}</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
        @endif
    </div>

    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Nilai
        </button>
        <table class="table table-hover">
            <tr>
                <th>Mata Kuliah</th>
                <th>Nilai</th>
                <th>Grade</th>

            </tr>
            @foreach ($mahasiswa->matkul as $matkul)
                <tr>
                    <td>{{ $matkul->matkul }}</td>
                    <td>{{ $matkul->pivot->nilai }}</td>
                    <td>
                        @if ($matkul->pivot->nilai >= 85)
                            <p>A</p>
                        @elseif($matkul->pivot->nilai >= 75 && $matkul->pivot->nilai < 85)
                            <p>B</p>
                        @elseif($matkul->pivot->nilai >= 65 && $matkul->pivot->nilai < 75)
                            <p>C</p>
                        @elseif($matkul->pivot->nilai >= 50 && $matkul->pivot->nilai < 65)
                            <p>D</p>
                        @else
                            <p>E</p>
                        @endif
                    </td>
                    <td>
                        <a href="/mahasiswa/{{ $mahasiswa->id }}/profile/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/mahasiswa/{{ $mahasiswa->id }}/profile/delete" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin Mau Dihapus?')">Delete</a>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Nilai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/mahasiswa/{{ $mahasiswa->id }}/addnilai" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="matkul" class="form-label">Mata Kuliah</label>

                            <select class="form-control" id="matkul" name="matkul">
                                @foreach ($mata_kuliah as $mk)
                                    <option value="{{ $mk->id }}">{{ $mk->matkul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai</label>
                            <input name="nilai" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('nilai') }}">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    @stop
