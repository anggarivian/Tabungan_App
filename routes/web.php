<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
});

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/petugas', [AdminController::class, 'index'])->name('petugas');
    Route::post('/admin/petugas/add', [AdminController::class, 'store'])->name('petugas.store');
    Route::get('admin/ajaxadmin/dataPetugas/{id}', [AdminController::class, 'getDataPetugas']);
    Route::patch('admin/petugas/update', [AdminController::class, 'edit'])->name('petugas.ubah');
    Route::get('admin/petugas/delete/{id}', [AdminController::class,'destroy'])->name('petugas.hapus');
    Route::get('/admin/laporan/petugas', [AdminController::class, 'laporan'])->name('laporan.petugas');
});