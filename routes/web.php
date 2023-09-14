<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ProfesiController;
use App\Http\Controllers\Admin\StatusPegawaiController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\JenisPkController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\DataDokumenController;
use App\Http\Controllers\Perawat\PegawaiController;
use App\Http\Controllers\Perawat\DokumenController;
use App\Http\Controllers\Perawat\StrController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'user-access:perawat'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'perawatDashboard'])->name('dashboard');

    // lengkapi akun
    Route::get('/complete-account', [PegawaiController::class, 'completeAccount'])->name('complete-account');
    Route::post('/complete-account', [PegawaiController::class, 'save'])->name('complete-account.save');

    // str
    Route::get('/str', [StrController::class, 'index'])->name('str.index');
    Route::get('/str/upload', [StrController::class, 'create'])->name('str.create');
    Route::post('/str', [StrController::class, 'store'])->name('str.store');
    Route::get('/str/edit', [StrController::class, 'edit'])->name('str.edit');
    Route::post('/str/update', [StrController::class, 'update'])->name('str.update');
    Route::delete('/str/destroy/{id}', [StrController::class, 'destroy'])->name('str.destroy');
    // Route::get('/upload-dokumen', [DokumenController::class, 'upload'])->name('dokumen.upload');
});

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
   
    // profesi
    Route::post('/profesi', [ProfesiController::class, 'index'])->name('profesi.index');
    Route::get('/profesi', [ProfesiController::class, 'index'])->name('profesi.index');
    Route::get('/profesi/data', [ProfesiController::class, 'data'])->name('profesi.data');
    Route::get('/profesi/input', [ProfesiController::class, 'input'])->name('profesi.input');
    Route::post('/profesi/create', [ProfesiController::class, 'create'])->name('profesi.create');
    Route::get('/profesi/edit', [ProfesiController::class, 'edit'])->name('profesi.edit');
    Route::post('/profesi/update', [ProfesiController::class, 'update'])->name('profesi.update');
    Route::delete('/profesi/destroy/{id}', [ProfesiController::class, 'destroy'])->name('profesi.destroy');

    // status pegawai
    Route::post('/status-pegawai', [StatusPegawaiController::class, 'index'])->name('status-pegawai.index');
    Route::get('/status-pegawai', [StatusPegawaiController::class, 'index'])->name('status-pegawai.index');
    Route::get('/status-pegawai/data', [StatusPegawaiController::class, 'data'])->name('status-pegawai.data');
    Route::get('/status-pegawai/input', [StatusPegawaiController::class, 'input'])->name('status-pegawai.input');
    Route::post('/status-pegawai/create', [StatusPegawaiController::class, 'create'])->name('status-pegawai.create');
    Route::get('/status-pegawai/edit', [StatusPegawaiController::class, 'edit'])->name('status-pegawai.edit');
    Route::post('/status-pegawai/update', [StatusPegawaiController::class, 'update'])->name('status-pegawai.update');
    Route::delete('/status-pegawai/destroy/{id}', [StatusPegawaiController::class, 'destroy'])->name('status-pegawai.destroy');

    // ruangan
    Route::post('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
    Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
    Route::get('/ruangan/data', [RuanganController::class, 'data'])->name('ruangan.data');
    Route::get('/ruangan/input', [RuanganController::class, 'input'])->name('ruangan.input');
    Route::post('/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
    Route::get('/ruangan/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::post('/ruangan/update', [RuanganController::class, 'update'])->name('ruangan.update');
    Route::delete('/ruangan/destroy/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

    // jenis pk
    Route::post('/jenis-pk', [JenisPkController::class, 'index'])->name('jenisPk.index');
    Route::get('/jenis-pk', [JenisPkController::class, 'index'])->name('jenisPk.index');
    Route::get('/jenis-pk/data', [JenisPkController::class, 'data'])->name('jenisPk.data');
    Route::get('/jenis-pk/input', [JenisPkController::class, 'input'])->name('jenisPk.input');
    Route::post('/jenis-pk/create', [JenisPkController::class, 'create'])->name('jenisPk.create');
    Route::get('/jenis-pk/edit', [JenisPkController::class, 'edit'])->name('jenisPk.edit');
    Route::post('/jenis-pk/update', [JenisPkController::class, 'update'])->name('jenisPk.update');
    Route::delete('/jenis-pk/destroy/{id}', [JenisPkController::class, 'destroy'])->name('jenisPk.destroy');

    // area
    Route::post('/area', [AreaController::class, 'index'])->name('area.index');
    Route::get('/area', [AreaController::class, 'index'])->name('area.index');
    Route::get('/area/data', [AreaController::class, 'data'])->name('area.data');

    // dokumen
    Route::get('/dokumen/str', [DataDokumenController::class, 'str'])->name('dokumen.str');
});

Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [DashboardController::class, 'superAdminDashboard'])->name('superadmin.dashboard');
});
