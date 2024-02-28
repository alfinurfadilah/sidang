<?php
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loginmikrotik/index', [App\Http\Controllers\LoginMikrotikController::class, 'index'])->name('loginmikrotik.index');
Route::post('/loginmikrotik/index', [App\Http\Controllers\LoginMikrotikController::class, 'login'])->name('login.post');

Route::get('/pppoe/index', [App\Http\Controllers\PppoeController::class, 'index'])->name('pppoe.index');


Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('datacalonpelanggan', \App\Http\Controllers\DatacalonpelangganController::class)->middleware('auth');
Route::resource('paket', \App\Http\Controllers\PaketController::class)->middleware('auth');
Route::resource('site', \App\Http\Controllers\SiteController::class)->middleware('auth');

Route::resource('datacekcoverage', \App\Http\Controllers\DatacekcoverageController::class)->middleware('auth');

Route::resource('jadwalsurvey', \App\Http\Controllers\JadwalsurveyController::class)->middleware('auth');
Route::resource('jadwalsurveyteknisi', \App\Https\Controllers\JadwalsurveyteknisiController::class)->middleware('auth');

Route::resource('reportsurvey', \App\Http\Controllers\ReportsurveyController::class)->middleware('auth');

Route::resource('jadwalpemasangan', \App\Http\Controllers\JadwalpemasanganController::class)->middleware('auth');
Route::resource('jadwalpemasanganteknisi', \App\Http\Controllers\JadwalpemasanganteknisiController::class)->middleware('auth');
Route::resource('reportpemasangan', \App\Http\Controllers\ReportpemasanganController::class)->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');

// Route::post('/kirim-data', [DataController::class, 'kirimData']);
Route::resource('dashboard', \App\Http\Controllers\HomeController::class)->middleware('auth');
