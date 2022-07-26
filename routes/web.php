<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisTanamanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TanamanController;
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
Route::post('/',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::group(["middleware"=>"auth"],function(){

    Route::get('/home',function(){
        return view('dashboard.index',['title'=>'Dashboard']);
    });
    Route::resource('/tanaman',TanamanController::class);
    Route::resource('/pegawai',PegawaiController::class);
    Route::resource('/jenis-tanaman',JenisTanamanController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});
