<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    /**
     * Tampilkan halaman jadwal kuliah.
     */
    public function jadwalKuliah()
    {
        // Kirim data yang dibutuhkan ke view (jika ada)
        return view('kaprodi.jadwal-kuliah');
    }
}
