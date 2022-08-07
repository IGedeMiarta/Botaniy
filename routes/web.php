<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisTanamanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class,'index']);
Route::get('/find/{slug}',[LandingController::class,'getTanaman']);

Route::post('/',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::group(["middleware"=>"auth"],function(){
    Route::get('/home',[DashboardController::class,'index']);
    Route::resource('/tanaman',TanamanController::class);
    Route::resource('/pegawai',PegawaiController::class);
    Route::resource('/jenis-tanaman',JenisTanamanController::class);
    Route::resource('/pembelian', TransaksiController::class);
    Route::get('get-all-tanman',[TransaksiController::class,'getTanaman']);
    Route::get('laporan-tanaman',[LaporanController::class,'tanaman']);
    Route::get('tanaman-cetak',[LaporanController::class,'cetak_pdf']);
    Route::get('qr-cetak',[LaporanController::class,'cetak_qr']);
    Route::get('laporan-pegawai',[LaporanController::class,'pegawai']);
    Route::get('pegawai-cetak',[LaporanController::class,'cetak_pegawai']);


    Route::post('/logout', [AuthController::class, 'logout']);
});

