<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\LaboratoriumController;

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
    return redirect()->route('home');
});

Auth::routes([
    'register' => false,
    'reset' => true,
]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('laboratorium', LaboratoriumController::class);
    Route::get('laboratorium/{laboratorium}/print', [LaboratoriumController::class, 'print'])->name('laboratorium.print');

    Route::resource('laporan', LaporanController::class)->only('index', 'show');
    Route::post('setujui-laporan/{laporan}', [LaporanController::class, 'persetujuan'])->name('laporan.persetujuan');
    Route::post('tolak-laporan/{laporan}', [LaporanController::class, 'tolak'])->name('laporan.tolak');

    Route::resource('laboratorium.barang', BarangController::class)->except('index', 'create');

    Route::resource('jenis-barang', JenisBarangController::class)->except('show');

    Route::resource('pelapor', PelaporController::class)->only('index', 'show', 'destroy');

    Route::resource('admin', UserController::class)->names('users')->except('show');

    // Route::resource('general', GeneralController::class)->only('edit', 'update');
    Route::get('general', [GeneralController::class, 'edit'])->name('general.edit');
    Route::put('general', [GeneralController::class, 'update'])->name('general.update');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('grafik', [GrafikController::class, 'index'])->name('grafik');
});
