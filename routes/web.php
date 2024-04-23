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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard-admin', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('dashboard.admin');
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('dashboard-teknisi', [App\Http\Controllers\HomeTeknisiController::class, 'index'])->name('dashboard.teknisi');

    // DASHBOARD REALTIME
    Route::get('dashboard/report', [App\Http\Controllers\HomeController::class, 'report'])->name('dashboard.report');
    Route::get('dashboard/cpu', [App\Http\Controllers\HomeController::class, 'cpu'])->name('dashboard.cpu');
    Route::get('dashboard/uptime', [App\Http\Controllers\HomeController::class, 'uptime'])->name('dashboard.uptime');
    Route::get('dashboard/{traffic}', [App\Http\Controllers\HomeController::class, 'traffic'])->name('dashboard.traffic');

    //TRAFFIC UP/DOWN
    Route::get('report-traffic', [App\Http\Controllers\ReportController::class, 'index'])->name('traffic.index');
    Route::get('up', [App\Http\Controllers\ReportController::class, 'up'])->name('up');
    Route::get('down', [App\Http\Controllers\ReportController::class, 'down'])->name('down');

});


Route::get('/loginmikrotik/index', [App\Http\Controllers\LoginMikrotikController::class, 'index'])->name('loginmikrotik.index');
Route::post('/loginmikrotik/index', [App\Http\Controllers\LoginMikrotikController::class, 'login'])->name('login.post');

Route::get('/pppoe/secret', [App\Http\Controllers\PppoeController::class, 'index'])->name('pppoe.secret');
Route::post('/pppoe/secret/add', [App\Http\Controllers\PppoeController::class, 'add'])->name('pppoe.add');
Route::get('/pppoe/secret/edit/{id}', [App\Http\Controllers\PppoeController::class, 'edit'])->name('pppoe.edit');
Route::post('/pppoe/secret/update/', [App\Http\Controllers\PppoeController::class, 'update'])->name('pppoe.update');
Route::get('/pppoe/secret/delete/{id}', [App\Http\Controllers\PppoeController::class, 'delete'])->name('pppoe.delete');
Route::get('/export-excel', [App\Http\Controllers\DatapembayaranController::class, 'exportExcel'])->name('export-excel');


Route::resource('datacalonpelanggan', \App\Http\Controllers\DatacalonpelangganController::class)->middleware('auth');
Route::resource('datapembayaran', \App\Http\Controllers\DatapembayaranController::class)->middleware('auth');
Route::resource('paket', \App\Http\Controllers\PaketController::class)->middleware('auth');
Route::resource('site', \App\Http\Controllers\SiteController::class)->middleware('auth');
Route::resource('teknisi', \App\Http\Controllers\TeknisiController::class)->middleware('auth');

Route::resource('datacekcoverage', \App\Http\Controllers\DatacekcoverageController::class)->middleware('auth');

Route::resource('jadwalsurvey', \App\Http\Controllers\JadwalsurveyController::class)->middleware('auth');
Route::resource('jadwalsurveyteknisi', \App\Https\Controllers\JadwalsurveyteknisiController::class)->middleware('auth');

Route::resource('reportsurvey', \App\Http\Controllers\ReportsurveyController::class)->middleware('auth');

Route::resource('jadwalpemasangan', \App\Http\Controllers\JadwalpemasanganController::class)->middleware('auth');
Route::resource('jadwalpemasanganteknisi', \App\Http\Controllers\JadwalpemasanganteknisiController::class)->middleware('auth');
Route::resource('reportpemasangan', \App\Http\Controllers\ReportpemasanganController::class)->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');