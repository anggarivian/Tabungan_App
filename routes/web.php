<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SiswaController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('admin');
})->middleware('auth');

Route::get('/admin', [HomeController::class, 'index'])->name('admin')->middleware('auth');

Route::get('admin/ajaxadmin/dataUser/{id}', [AdminController::class, 'getDataUser'])->middleware('auth');
Route::get('petugas/ajaxpetugas/dataPengajuan/{id}', [PengajuanController::class, 'getDataPengajuan'])->middleware('auth');

// Admin Route -----------------------------------------------------------------------------------------------------
Route::middleware('admin')->group(function () {
    Route::get('/admin/petugas', [AdminController::class, 'index'])->name('petugas');
    Route::post('/admin/petugas/add', [AdminController::class, 'store'])->name('petugas.store');
    Route::patch('admin/petugas/update', [AdminController::class, 'edit'])->name('petugas.ubah');
    Route::get('admin/petugas/delete/{id}', [AdminController::class,'destroy'])->name('petugas.hapus');
    Route::get('/admin/laporan/petugas', [AdminController::class, 'laporan'])->name('laporan.petugas');
});

// Petugas Route ---------------------------------------------------------------------------------------------------
Route::middleware('petugas')->group(function () {
    Route::get('/petugas/siswa', [PetugasController::class, 'index'])->name('siswa');
    Route::post('/petugas/siswa/add', [PetugasController::class, 'store'])->name('siswa.store');
    Route::patch('petugas/siswa/update', [PetugasController::class, 'edit'])->name('siswa.ubah');
    Route::get('petugas/siswa/delete/{id}', [PetugasController::class,'destroy'])->name('siswa.hapus');
    Route::get('/petugas/laporan/siswa', [PetugasController::class, 'laporan'])->name('laporan.siswa');

    // Kelola Tabungan ---------------------------------------------------------------------------------------------
        // Stor Tabungan -------------------------------------------------------------------------------------------
        Route::get('/petugas/tabungan/stor-tabungan', [TabunganController::class, 'index_stor'])->name('tabungan.stor');
        Route::patch('/petugas/tabungan/stor-tabungan', [TabunganController::class, 'stor_tabungan'])->name('tabungan.stor.tambah');

        // Tarik Tabungan ------------------------------------------------------------------------------------------
        Route::get('/petugas/tabungan/tarik-tabungan', [TabunganController::class, 'index_tarik'])->name('tabungan.tarik');
        Route::patch('/petugas/tabungan/tarik-tabungan', [TabunganController::class, 'tarik_tabungan'])->name('tabungan.tarik.tambah');

        // Kelola Pengajuan ----------------------------------------------------------------------------------------
        Route::get('/petugas/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
        Route::post('/petugas/pengajuan/setuju', [PengajuanController::class, 'setuju'])->name('pengajuan.setuju');
        Route::post('/petugas/pengajuan/tolak', [PengajuanController::class, 'tolak'])->name('pengajuan.tolak');
});

// Siswa Route -----------------------------------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/siswa/pengajuan', [PengajuanController::class, 'siswa_index'])->name('siswa.pengajuan');
    Route::post('/siswa/pengajuan/add', [PengajuanController::class, 'store'])->name('siswa.ajukan');
    Route::get('/siswa/riwayat', [PengajuanController::class, 'index'])->name('siswa.riwayat');
});