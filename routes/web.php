<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\KaprodiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Guest Routes
Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login'); 
    Route::post('/', [SesiController::class, 'login']); 
});

// Redirect Home Route
Route::get('/home', function(){
    return redirect('/admin');
});

// Rute untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {
    // Rute Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Rute untuk Kaprodi
    Route::middleware(['userAkses:kaprodi'])->group(function () {
        Route::get('/admin/kaprodi', [AdminController::class, 'kaprodi'])->name('kaprodi.dashboard');
        Route::get('/kaprodi/jadwal-kuliah', [KaprodiController::class, 'jadwalKuliah'])->name('jadwal.kuliah');
        Route::get('/kaprodi/verifikasi-irs', function () {
            return view('kaprodi.verifikasi-irs');
        })->name('verifikasi.irs');
    });

    // Rute untuk Bagian Akademik
    Route::middleware(['userAkses:bagianakd'])->group(function () {
        // Rute untuk Dashboard Bagian Akademik
        Route::get('/admin/bagianakd', [AdminController::class, 'bagianakd'])->name('bagianakd.dashboard');

        // Rute untuk CRUD Ruang
        Route::prefix('/bagianakd/ruang')->middleware(['auth'])->group(function () {
            Route::get('/', [RuangController::class, 'index'])->name('ruang.index');
            Route::get('/create', [RuangController::class, 'create'])->name('ruang.create');
            Route::post('/', [RuangController::class, 'store'])->name('ruang.store');
            Route::get('/{id}/edit', [RuangController::class, 'edit'])->name('ruang.edit');
            Route::put('/{id}', [RuangController::class, 'update'])->name('ruang.update');
            Route::delete('/{id}', [RuangController::class, 'destroy'])->name('ruang.destroy');
        });
    });

    // Rute untuk Marketing
    Route::middleware(['userAkses:marketing'])->group(function () {
        Route::get('/admin/marketing', [AdminController::class, 'marketing'])->name('marketing.dashboard');
    });

    // Logout dengan AuthController
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Fallback untuk rute yang tidak ditemukan
Route::fallback(function () {
    return response()->view('errors.403', [
        'message' => 'Halaman tidak ditemukan atau Anda tidak memiliki izin untuk mengakses.',
    ], 403);
});
