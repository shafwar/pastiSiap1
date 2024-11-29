<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    /**
     * Menampilkan halaman jadwal kuliah.
     */
    public function jadwalKuliah()
    {
        // Anda dapat menyesuaikan data yang ingin ditampilkan.
        return view('kaprodi.jadwal-kuliah');
    }
}
