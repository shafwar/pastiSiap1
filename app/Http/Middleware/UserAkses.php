<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user sudah login
        if (auth()->check() && auth()->user()->role == $role) {
            return $next($request);
        }
        
        // Redirect ke halaman yang diinginkan jika akses ditolak
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
