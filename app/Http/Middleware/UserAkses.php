<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah user sudah login
        if (auth()->check()) {
            $userRole = auth()->user()->role; // Ambil role user saat ini

            // Debug role jika diperlukan
            Log::info("Middleware memeriksa role pengguna: " . $userRole);

            // Cek apakah role user sesuai
            if ($userRole === $role) {
                Log::info("Akses diizinkan untuk: " . auth()->user()->email . " dengan role: " . $userRole);
                return $next($request); // Lanjutkan ke request berikutnya
            }

            // Jika role tidak sesuai
            Log::warning("Akses ditolak untuk: " . auth()->user()->email . ". Role saat ini: " . $userRole . ". Role yang diperlukan: " . $role);

            // Redirect ke halaman 403 jika role tidak sesuai
            return response()->view('errors.403', [
                'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.',
            ], 403);
        }

        // Jika user belum login
        Log::info("Akses ditolak: pengguna belum login.");
        return redirect()->route('login')->withErrors([
            'message' => 'Silakan login untuk mengakses halaman ini.',
        ]);
    }

    /**
     * Tambahan untuk menangani log aktivitas middleware.
     * Fungsi ini tidak mengubah proses handle, tetapi untuk
     * mencatat aktivitas tambahan jika dibutuhkan.
     */
    protected function logAccessAttempt(Request $request, $role)
    {
        Log::info("Middleware UserAkses dijalankan pada URI: " . $request->getRequestUri());
        Log::info("Role yang dibutuhkan: " . $role . ". User-Agent: " . $request->header('User-Agent'));
    }

    /**
     * Fungsi tambahan untuk debugging akses user.
     * Digunakan saat Anda ingin mengetahui lebih detail informasi user.
     */
    protected function debugUserInfo()
    {
        $user = auth()->user();

        if ($user) {
            Log::info("Debugging info user:");
            Log::info("Email: " . $user->email);
            Log::info("Role: " . $user->role);
            Log::info("Created At: " . $user->created_at);
        } else {
            Log::info("Tidak ada informasi user karena belum login.");
        }
    }
}
