<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\InputPelanggaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.before-login');
});

Route::get('/welcome', function () {
    return view('layouts.web');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori')->middleware('checkLevel:admin');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store')->middleware('checkLevel:admin');
    Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete')->middleware('checkLevel:admin');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.put')->middleware('checkLevel:admin');

    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas')->middleware('checkLevel:admin');
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store')->middleware('checkLevel:admin');
    Route::delete('/kelas/delete/{id}', [KelasController::class, 'destroy'])->name('kelas.delete')->middleware('checkLevel:admin');
    Route::put('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.put')->middleware('checkLevel:admin');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('checkLevel:admin');
    Route::put('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete')->middleware('checkLevel:admin');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.put')->middleware('checkLevel:admin');
    Route::put('/users/updaterole/{id}', [UserController::class, 'update_role'])->name('users.updaterole')->middleware('checkLevel:admin');

    // Statistik
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');

    // Pelanggaran
    Route::get('/pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran')->middleware('checkLevel:admin,siswa');
    Route::post('/pelanggaran/store', [PelanggaranController::class, 'store'])->name('pelanggaran.store')->middleware('checkLevel:guru,admin');
    Route::get('/input-pelanggaran', [PelanggaranController::class, 'view_input'])->name('input-pelanggaran')->middleware('checkLevel:admin,guru');
    Route::get('/get-nisn', [PelanggaranController::class, 'get_nisn'])->middleware('checkLevel:admin, guru');
    Route::get('/get-nama-by-kelas', [PelanggaranController::class, 'get_nama_by_kelas'])->middleware('checkLevel:admin, guru');
    Route::get('/exportpelanggaran', [PelanggaranController::class, 'pelanggaranexport'])->name('pelanggaranexport')->middleware('checkLevel:admin');

    // Siswa
    // Route::get('/detail/siswa', [SiswaController::class, 'index'])->name('siswa')->middleware('checkLevel:siswa');
    Route::get('/detail/siswa/{id}', [SiswaController::class, 'detail'])->name('siswa')->middleware('checkLevel:siswa');
});

