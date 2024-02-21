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
Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('datacalonpelanggan', \App\Http\Controllers\datacalonpelangganController::class)->middleware('auth');
Route::resource('paket', \App\Http\Controllers\paketController::class)->middleware('auth');
Route::resource('site', \App\Http\Controllers\siteController::class)->middleware('auth');

Route::resource('datacekcoverage', \App\Http\Controllers\datacekcoverageController::class)->middleware('auth');

Route::resource('jadwalsurvey', \App\Http\Controllers\jadwalsurveyController::class)->middleware('auth');
Route::resource('jadwalsurveyteknisi', \App\Http\Controllers\jadwalsurveyteknisiController::class)->middleware('auth');

Route::resource('reportsurvey', \App\Http\Controllers\reportsurveyController::class)->middleware('auth');

Route::resource('jadwalpemasangan', \App\Http\Controllers\jadwalpemasanganController::class)->middleware('auth');
Route::resource('jadwalpemasanganteknisi', \App\Http\Controllers\jadwalpemasanganteknisiController::class)->middleware('auth');
Route::resource('reportpemasangan', \App\Http\Controllers\reportpemasanganController::class)->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');

// Route::post('/kirim-data', [DataController::class, 'kirimData']);
Route::resource('dashboard', \App\Http\Controllers\HomeController::class)->middleware('auth');
