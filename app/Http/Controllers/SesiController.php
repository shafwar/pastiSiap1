<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{ 
  function index()
    {
        return view('login');
    }
    function login(Request $request)
    {
      $request->validate([
        'email'=>'required',
        'password'=>'required'  
      ],[
        'email.required' => 'Email wajib diisi',
        'password.required' => 'Password wajib diisi',
      ]);

      $infologin= [
        'email'=>$request->email,
        'password'=>$request->password,

      ];

      if (Auth::attempt($infologin)) {
        if (Auth::user()->role == 'operator'){
          return redirect('admin/operator');
        } elseif (Auth::user()->role == 'keuangan') {
            return redirect('admin/keuangan');
        } elseif (Auth::user()->role == 'marketing') {         
          return redirect('admin/marketing');
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
            default => redirect('/')->withErrors('Role tidak dikenal.'),
        };
    }
}
  