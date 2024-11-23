<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\PembimbingAkademikController;
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

// Authenticated Routes
Route::middleware(['auth'])->group(function(){

    // Admin Dashboard Routes
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/operator', [AdminController::class, 'operator'])->middleware('userAkses:operator');
    Route::get('/admin/keuangan', [AdminController::class, 'keuangan'])->middleware('userAkses:keuangan');
    Route::get('/admin/marketing', [AdminController::class, 'marketing'])->middleware('userAkses:marketing');

    // Logout Route
    Route::get('/logout', [SesiController::class, 'logout']);

    // New Route for Pembimbing Akademik Dashboard
    Route::get('/pembimbingakademik', [PembimbingAkademikController::class, 'index']);
    Route::get('/verifikasi-irs', [PembimbingAkademikController::class, 'verifikasiIrs'])->name('verifikasi.irs');
});
