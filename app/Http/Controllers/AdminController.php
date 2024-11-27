<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        return $this->authorizeAndLoadDashboard('admin', 'bagianakd.admin');
    }

    public function kaprodi()
    {
        return $this->authorizeAndLoadDashboard('kaprodi', 'kaprodi.dashboard');
    }

    public function bagianakd()
    {
        return $this->authorizeAndLoadDashboard('bagianakd', 'bagianakd.dashboard');
    }

    public function dekan()
    {
        return $this->authorizeAndLoadDashboard('dekan', 'dekan.dashboard');
    }

    private function authorizeAndLoadDashboard(string $expectedRole, string $viewName)
    {
        // Periksa role pengguna
        $currentRole = auth()->user()->role;

        if ($currentRole !== $expectedRole) {
            Log::warning('Akses tidak sah ke: ' . $viewName . '. Role pengguna: ' . $currentRole);
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        Log::info('Akses diizinkan ke: ' . $viewName . ' untuk pengguna: ' . auth()->user()->email);

        return view($viewName, ['role' => $expectedRole]);
    }
}
