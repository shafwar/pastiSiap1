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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            Log::info('Akses ditolak: pengguna belum login.');
            return redirect()->route('login')->withErrors(['error' => 'Anda harus login terlebih dahulu.']);
        }

        // Ambil role pengguna yang sedang login
        $userRole = Auth::user()->role;

        // Jika role yang diberikan berupa string, ubah menjadi array
        if (is_string($role)) {
            $role = [$role];
        }

        // Cek apakah role pengguna sesuai dengan yang diperlukan
        if (!in_array($userRole, $role)) {
            Log::warning('Akses ditolak untuk pengguna: ' . Auth::user()->email . '. Role saat ini: ' . $userRole . '. Role yang diperlukan: ' . implode(', ', $role));
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        Log::info('Akses diizinkan untuk pengguna: ' . Auth::user()->email . ' dengan role: ' . $userRole);

        // Lanjutkan permintaan jika role sesuai
        return $next($request);
    }
}
