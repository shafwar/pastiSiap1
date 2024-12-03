<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SesiController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function index()
    {
        // Cek apakah user sudah login, jika ya redirect sesuai role
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->role);
        }

        // Tampilkan halaman login
        return view('login'); // Sesuaikan namespace view
    }

    /**
     * Proses login pengguna.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email', // Validasi format email
            'password' => 'required|min:6', // Minimal panjang password
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        // Data untuk proses login
        $credentials = $request->only('email', 'password');

        // Proses login
        if (Auth::attempt($credentials)) {
            // Log user berhasil login
            Log::info('Login berhasil untuk pengguna: ' . Auth::user()->email);

            // Ambil role pengguna yang berhasil login
            $role = Auth::user()->role;

            // Debug role untuk verifikasi
           
            // Atur session berdasarkan role
            session(['showHeader' => $role === 'bagianakd']);
            session(['showHeader' => $role === 'dekan']);

            // Redirect berdasarkan role pengguna
            return $this->redirectByRole($role);
        }

        // Jika login gagal
        Log::warning('Percobaan login gagal dengan email: ' . $request->email);

        return redirect('/')
            ->withErrors(['login' => 'Email atau password salah.'])
            ->withInput();
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request)
    {
        // Log proses logout
        Log::info('Logout dilakukan oleh: ' . Auth::user()->email);

        // Proses logout
        Auth::logout();

        // Bersihkan semua sesi
        $request->session()->invalidate();

        // Regenerate session token untuk keamanan
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect('/')->with('status', 'Logout berhasil.');
    }

    /**
     * Redirect berdasarkan role pengguna.
     */
    private function redirectByRole($role)
    {
        return match ($role) {
            'bagianakd' => redirect('admin/bagianakd'),
            'kaprodi' => redirect('admin/kaprodi'),
            'marketing' => redirect('admin/marketing'),
            'dekan' => redirect('admin/dekan'),
            'pembimbingakademik' => redirect(to: 'admin/pembimbingakademik'),
            'mahasiswa' => redirect(to: 'admin/mahasiswa'),
            default => redirect('/')->withErrors('Role tidak dikenal.'),
        };
    }
}
