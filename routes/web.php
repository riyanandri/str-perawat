<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DokController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Perawat\SippController;
use App\Http\Controllers\Admin\JenisPkController;
use App\Http\Controllers\Admin\ProfesiController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Perawat\DokumenController;
use App\Http\Controllers\Perawat\PegawaiController;
use App\Http\Controllers\Admin\StatusPegawaiController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('test', function () {
//     echo $url = URL::temporarySignedRoute(
//         'login.url', 
//         now()->addDays(3),
//         [
//             'user_id' => 2,
//             'url' => route('dokumenPerawat.index')
//         ]
//     );
// });

Route::get('login-url', [LoginController::class, 'loginUrl'])->name('login.url');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'user-access:perawat'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'perawatDashboard'])->name('dashboard');

    // lengkapi akun
    Route::get('/lengkapi-akun', [PegawaiController::class, 'completeAccount'])->name('complete-account');
    Route::post('/lengkapi-akun', [PegawaiController::class, 'save'])->name('complete-account.save');

    // dokumen
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumenPerawat.index');
    Route::get('/dokumen/upload', [DokumenController::class, 'upload'])->name('dokumenPerawat.upload');
    Route::post('/dokumen/upload', [DokumenController::class, 'store'])->name('dokumenPerawat.store');

    // sipp
    Route::get('/dokumen/sipp', [SippController::class, 'index'])->name('sipp.index');
    Route::get('/dokumen/sipp/upload', [SippController::class, 'upload'])->name('sipp.upload');
    Route::post('/dokumen/sipp', [SippController::class, 'store'])->name('sipp.store');
    // Route::get('/str', [StrController::class, 'index'])->name('str.index');
    // Route::get('/str/upload', [StrController::class, 'create'])->name('str.create');
    // Route::post('/str', [StrController::class, 'store'])->name('str.store');
    // Route::get('/str/edit', [StrController::class, 'edit'])->name('str.edit');
    // Route::post('/str/update', [StrController::class, 'update'])->name('str.update');
    // Route::delete('/str/destroy/{id}', [StrController::class, 'destroy'])->name('str.destroy');
    // Route::get('/upload-dokumen', [DokumenController::class, 'upload'])->name('dokumen.upload');
});

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
   
    // profesi
    Route::post('/data-master/profesi', [ProfesiController::class, 'index'])->name('profesi.index');
    Route::get('/data-master/profesi', [ProfesiController::class, 'index'])->name('profesi.index');
    Route::get('/data-master/profesi/data', [ProfesiController::class, 'data'])->name('profesi.data');
    Route::get('/data-master/profesi/input', [ProfesiController::class, 'input'])->name('profesi.input');
    Route::post('/data-master/profesi/create', [ProfesiController::class, 'create'])->name('profesi.create');
    Route::get('/data-master/profesi/edit', [ProfesiController::class, 'edit'])->name('profesi.edit');
    Route::post('/data-master/profesi/update', [ProfesiController::class, 'update'])->name('profesi.update');
    Route::delete('/data-master/profesi/destroy/{id}', [ProfesiController::class, 'destroy'])->name('profesi.destroy');

    // status pegawai
    Route::post('/data-master/status-pegawai', [StatusPegawaiController::class, 'index'])->name('status-pegawai.index');
    Route::get('/data-master/status-pegawai', [StatusPegawaiController::class, 'index'])->name('status-pegawai.index');
    Route::get('/data-master/status-pegawai/data', [StatusPegawaiController::class, 'data'])->name('status-pegawai.data');
    Route::get('/data-master/status-pegawai/input', [StatusPegawaiController::class, 'input'])->name('status-pegawai.input');
    Route::post('/data-master/status-pegawai/create', [StatusPegawaiController::class, 'create'])->name('status-pegawai.create');
    Route::get('/data-master/status-pegawai/edit', [StatusPegawaiController::class, 'edit'])->name('status-pegawai.edit');
    Route::post('/data-master/status-pegawai/update', [StatusPegawaiController::class, 'update'])->name('status-pegawai.update');
    Route::delete('/data-master/status-pegawai/destroy/{id}', [StatusPegawaiController::class, 'destroy'])->name('status-pegawai.destroy');

    // ruangan
    Route::post('/data-master/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
    Route::get('/data-master/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
    Route::get('/data-master/ruangan/data', [RuanganController::class, 'data'])->name('ruangan.data');
    Route::get('/data-master/ruangan/input', [RuanganController::class, 'input'])->name('ruangan.input');
    Route::post('/data-master/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
    Route::get('/data-master/ruangan/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::post('/data-master/ruangan/update', [RuanganController::class, 'update'])->name('ruangan.update');
    Route::delete('/data-master/ruangan/destroy/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

    // jenis pk
    Route::post('/data-master/jenis-pk', [JenisPkController::class, 'index'])->name('jenisPk.index');
    Route::get('/data-master/jenis-pk', [JenisPkController::class, 'index'])->name('jenisPk.index');
    Route::get('/data-master/jenis-pk/data', [JenisPkController::class, 'data'])->name('jenisPk.data');
    Route::get('/data-master/jenis-pk/input', [JenisPkController::class, 'input'])->name('jenisPk.input');
    Route::post('/data-master/jenis-pk/create', [JenisPkController::class, 'create'])->name('jenisPk.create');
    Route::get('/data-master/jenis-pk/edit', [JenisPkController::class, 'edit'])->name('jenisPk.edit');
    Route::post('/data-master/jenis-pk/update', [JenisPkController::class, 'update'])->name('jenisPk.update');
    Route::delete('/data-master/jenis-pk/destroy/{id}', [JenisPkController::class, 'destroy'])->name('jenisPk.destroy');

    // area
    Route::post('/data-master/area', [AreaController::class, 'index'])->name('area.index');
    Route::get('/data-master/area', [AreaController::class, 'index'])->name('area.index');
    Route::get('/data-master/area/data', [AreaController::class, 'data'])->name('area.data');

    // dokumen sipp
    Route::get('/dokumen/sipp', [DokController::class, 'sipp'])->name('dokumenAdmin.sipp');
    Route::get('/dokumen/sipp/{id}', [DokController::class, 'detailSipp'])->name('dokumenAdmin.detailSipp');
    Route::put('/dokumen/sipp/{id}', [DokController::class, 'sippUpdateStatus'])->name('dokumenAdmin.sippUpdateStatus');

    // dokumen sipp
    Route::get('/dokumen/spkk', [DokController::class, 'spkk'])->name('dokumenAdmin.spkk');
    Route::post('/dokumen/spkk/updateStatus', [DokController::class, 'spkkUpdateStatus'])->name('dokumenAdmin.spkkUpdateStatus');

    // dokumen sipp
    Route::get('/dokumen/str', [DokController::class, 'str'])->name('dokumenAdmin.str');
    Route::post('/dokumen/str/updateStatus', [DokController::class, 'strUpdateStatus'])->name('dokumenAdmin.strUpdateStatus');

    Route::get('/dokumen', [DokController::class, 'index'])->name('dokumenAdmin.index');
    Route::post('/dokumen/updateStatus', [DokController::class, 'updateStatus'])->name('dokumenAdmin.updateStatus');
});

// Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
//     Route::get('/superadmin/dashboard', [DashboardController::class, 'superAdminDashboard'])->name('superadmin.dashboard');
// });
