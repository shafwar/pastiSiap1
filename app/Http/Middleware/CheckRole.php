<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Periksa apakah user sudah login
        if (!Auth::check()) {
            Log::info('Akses ditolak: pengguna belum login.');
            return redirect()->route('login')->withErrors([
                'error' => 'Anda harus login terlebih dahulu.',
            ]);
        }

        // Ambil role pengguna yang sedang login
        $userRole = Auth::user()->role;

        // Periksa apakah role pengguna sesuai
        if ($userRole !== $role) {
            Log::warning('Akses ditolak untuk pengguna: ' . Auth::user()->email . '. Role saat ini: ' . $userRole . '. Role yang diperlukan: ' . $role);
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        Log::info('Akses diizinkan untuk pengguna: ' . Auth::user()->email . ' dengan role: ' . $userRole);

        return $next($request); // Lanjutkan ke request berikutnya
    }
}
