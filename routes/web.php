<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatakuliahController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'auth'], function(){

    Route::get('/dasboard', [DashboardController::class, 'index']);

    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');;
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::post('/mahasiswa/{id}/update', [MahasiswaController::class, 'update'])->name('mahasiswa.edit');
    Route::get('/mahasiswa/{id}/delete', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
    Route::get('/mahasiswa/{id}/profile', [MahasiswaController::class, 'profile']);
    Route::post('/mahasiswa/{id}/addnilai', [MahasiswaController::class, 'addnilai']);


    Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
    Route::post('/matakuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');;
    Route::get('/matakuliah/{id}/edit', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::post('/matakuliah/{id}/update', [MatakuliahController::class, 'update'])->name('matakuliah.edit');
    Route::get('/matakuliah/{id}/delete', [MatakuliahController::class, 'delete'])->name('matakuliah.delete');
});
