<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    // Halaman dashboard untuk Admin
    public function index()
    {
        return $this->authorizeAndLoadDashboard('admin', 'admin.dashboard');
    }

    // Halaman dashboard untuk Kaprodi
    public function kaprodi()
    {
        return $this->authorizeAndLoadDashboard('kaprodi', 'kaprodi.dashboard');
    }

    // Halaman dashboard untuk Bagian Akademik
    public function bagianakd()
    {
        return $this->authorizeAndLoadDashboard('bagianakd', 'bagianakd.dashboard');
    }

    // Halaman dashboard untuk Dekan
    public function dekan()
    {
        return $this->authorizeAndLoadDashboard('dekan', 'dekan.dashboard');
    }

    public function pembimbingakademik()
    {
        return $this->authorizeAndLoadDashboard('pembimbingakademik', 'pembimbingakademik.dashboard');
    }

    // Fungsi untuk memeriksa role dan memuat halaman dashboard
    private function authorizeAndLoadDashboard(string $expectedRole, string $viewName)
    {
        // Periksa role pengguna saat ini
        $currentRole = auth()->user()->role;

        // Jika role pengguna tidak sesuai dengan role yang diharapkan
        if ($currentRole !== $expectedRole) {
            // Log peringatan untuk audit
            Log::warning("Akses tidak sah: {$viewName}. Role pengguna: {$currentRole}");

            // Menampilkan error 403 jika tidak memiliki akses
            return abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        // Jika role sesuai, log akses yang diizinkan
        Log::info("Akses diizinkan: {$viewName} untuk pengguna: " . auth()->user()->email);

        // Kembalikan tampilan dengan informasi role
        return view($viewName, ['role' => $expectedRole]);
    }
}
