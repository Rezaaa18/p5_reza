<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikel;
use App\Models\Ekskul;
use App\Models\Jurusan;
use App\Models\Industri;
use App\Models\Fasilitas;
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
    $artikel = Artikel::all();
    return view('welcome',compact('artikel'));
});

Route::get('/tampil_eskul', function () {
    $eskul = Ekskul::all();
    return view('eskul',compact('eskul'));
});


Route::get('/tampil_jurusan', function () {
    $jurusan = Jurusan::all();
    return view('jurusan',compact('jurusan'));
});

Route::get('/tampil_fasilitas', function () {
    $fasilitas = Fasilitas::all();
    return view('fasilitas',compact('fasilitas'));
});

Route::get('/tampil_industri', function () {
    $industri = Industri::all();
    return view('industri',compact('industri'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('fasilitas', App\Http\Controllers\FasilitasController::class)->middleware('auth');
Route::resource('jurusan', App\Http\Controllers\JurusanController::class)->middleware('auth');
Route::resource('industri', App\Http\Controllers\IndustriController::class)->middleware('auth');
Route::resource('artikel', App\Http\Controllers\ArtikelController::class)->middleware('auth');
Route::resource('ekskul', App\Http\Controllers\EkskulController::class)->middleware('auth');
