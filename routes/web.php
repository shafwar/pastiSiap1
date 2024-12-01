<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\DekanController; // Tambahkan controller untuk Dekan
use App\Http\Controllers\PembimbingAkademikController;
use Illuminate\Support\Facades\Route;

// Rute untuk user tamu (belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login'); // Halaman login
    Route::post('/', [SesiController::class, 'login']); // Proses login
});

// Redirect setelah login
Route::get('/home', function () {
    return redirect('/admin');
})->name('home.redirect');

// Rute untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {

    // Rute Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Rute untuk Kaprodi
    // Rute untuk Kaprodi
    Route::middleware(['userAkses:kaprodi'])->group(function () {
        Route::get('/admin/kaprodi', [AdminController::class, 'kaprodi'])->name('kaprodi.dashboard');
        Route::get('/kaprodi/jadwal-kuliah', [KaprodiController::class, 'jadwalKuliah'])->name('jadwal.kuliah');
        Route::post('/kaprodi/sendApproval', [KaprodiController::class, 'sendApproval'])->name('kaprodi.sendApproval');
    });


    // Rute untuk Bagian Akademik
    Route::middleware(['userAkses:bagianakd'])->group(function () {
        // Rute untuk Dashboard Bagian Akademik
        Route::get('/admin/bagianakd', [AdminController::class, 'bagianakd'])->name('bagianakd.dashboard');

        // Rute untuk CRUD Ruang
        Route::prefix('/bagianakd/ruang')->group(function () {
            Route::get('/', [RuangController::class, 'index'])->name('ruang.index'); // Halaman daftar ruang
            Route::get('/create', [RuangController::class, 'create'])->name('ruang.create'); // Halaman form tambah ruang
            Route::post('/', [RuangController::class, 'store'])->name('ruang.store'); // Proses tambah ruang
            // Rute Edit Ruang
            Route::get('/{id}/edit', [RuangController::class, 'edit'])->name('ruang.edit'); // Halaman edit ruang
            // Rute Update Ruang    
            Route::put('/{id}', [RuangController::class, 'update'])->name('ruang.update'); // Proses update ruang
            Route::delete('/{id}', [RuangController::class, 'destroy'])->name('ruang.destroy'); // Proses hapus ruang

            // Rute untuk mengajukan ruang (Bagi Bagian Akademik)
            Route::post('/ajukan/{id}', [RuangController::class, 'ajukanRuang'])->name('ruang.ajukan'); // Mengajukan ruang untuk disetujui

            // **Rute untuk Pengajuan Ulang Ruang** - Rute ini memungkinkan Bagian Akademik untuk mengajukan ulang ruang
            Route::post('/ajukan-ulang/{id}', [RuangController::class, 'ajukanUlang'])->name('ruang.ajukanUlang'); // Pengajuan ulang ruang
        });
    });

    // Rute untuk Marketing
    Route::middleware(['userAkses:marketing'])->group(function () {
        Route::get('/admin/marketing', [AdminController::class, 'marketing'])->name('marketing.dashboard');
    });

    // Rute untuk Dekan
    Route::middleware(['userAkses:dekan'])->group(function () {
        // Dashboard Dekan
        Route::get('/admin/dekan', [AdminController::class, 'dekan'])->name('dekan.dashboard');
        Route::get('dekan/kuliah', [DekanController::class, 'kuliah'])->name('dekan.kuliah');
        // Dekan
        Route::get('dekan/ruang', [DekanController::class, 'ruang'])->name('dekan.ruang');
        Route::get('/dekan/approvals', [DekanController::class, 'approvals'])->name('dekan.approvals');
        
        // Rute untuk persetujuan ruang
        Route::post('/dekan/approve/{id}', [RuangController::class, 'approve'])->name('dekan.approve'); // Aksi persetujuan ruang

        // Rute untuk mengubah status ruang (Disetujui / Tidak Disetujui)
        Route::put('/dekan/ruang/status/{id}', [RuangController::class, 'toggleStatus'])->name('ruang.toggleStatus'); // Mengubah status ruang

        // **Rute untuk Menolak Ruang** - Menambahkan rute penolakan ruang oleh Dekan
        Route::post('/dekan/reject/{id}', [RuangController::class, 'reject'])->name('dekan.reject'); // Aksi penolakan ruang
    });

    Route::middleware(['userAkses:pembimbingakademik'])->group(function () {
        Route::get('/admin/pembimbingakademik', [AdminController::class, 'pembimbingakademik'])->name('pembimbingakademik.dashboard');
        Route::get('/pembimbingakademik/verifikasi-irs', [PembimbingAkademikController::class, 'verifikasiIRS'])->name('verifikasi-irs');
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
