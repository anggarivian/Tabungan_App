<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\PengajuanController;

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
Route::get('/home', function () {
    return redirect()->route('admin');
})->middleware('admin');

Auth::routes();

// Beranda Dashboard Route -----------------------------------------------------------------------------------------
Route::get('/admin', [HomeController::class, 'index'])->name('admin');

// Ambil Data Route ------------------------------------------------------------------------------------------------
Route::get('admin/ajaxadmin/dataUser/{id}', [AdminController::class, 'getDataUser']);

// Admin routes ----------------------------------------------------------------------------------------------------
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/petugas', [AdminController::class, 'index'])->name('petugas');
    Route::post('/admin/petugas/add', [AdminController::class, 'store'])->name('petugas.store');
    Route::get('admin/ajaxadmin/dataUser/{id}', [AdminController::class, 'getDataUser']);
    Route::patch('admin/petugas/update', [AdminController::class, 'edit'])->name('petugas.ubah');
    Route::get('admin/petugas/delete/{id}', [AdminController::class,'destroy'])->name('petugas.hapus');
    Route::get('/admin/laporan/petugas', [AdminController::class, 'laporan'])->name('laporan.petugas');
});

// Petugas Routes --------------------------------------------------------------------------------------------------
Route::group(['middleware' => 'auth'], function () {

    // Kelola Siswa ------------------------------------------------------------------------------------------------
    Route::get('/admin/siswa', [PetugasController::class, 'index'])->name('siswa');
    Route::post('/admin/siswa/add', [PetugasController::class, 'store'])->name('siswa.store');
    Route::patch('admin/siswa/update', [PetugasController::class, 'edit'])->name('siswa.ubah');
    Route::get('admin/siswa/delete/{id}', [PetugasController::class,'destroy'])->name('siswa.hapus');
    Route::get('/admin/laporan/siswa', [PetugasController::class, 'laporan'])->name('laporan.siswa');

    // Kelola Tabungan ---------------------------------------------------------------------------------------------
        // Stor Tabungan -------------------------------------------------------------------------------------------
        Route::get('/admin/tabungan/stor-tabungan', [TabunganController::class, 'index_stor'])->name('tabungan.stor');
        Route::patch('/admin/tabungan/stor-tabungan', [TabunganController::class, 'stor_tabungan'])->name('tabungan.stor.tambah');

        // Tarik Tabungan ------------------------------------------------------------------------------------------
        Route::get('/admin/tabungan/tarik-tabungan', [TabunganController::class, 'index_tarik'])->name('tabungan.tarik');

    // Kelola Pengajuan ---------------------------------------------------------------------------------------------
    Route::get('/admin/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');

});