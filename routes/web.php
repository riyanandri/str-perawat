<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ProfesiController;

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
});

Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [DashboardController::class, 'superAdminDashboard'])->name('superadmin.dashboard');
});
