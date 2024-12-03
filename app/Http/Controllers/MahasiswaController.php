<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKuliah;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan halaman verifikasi IRS.
     */
    public function herRegistrasi()
    {
        return view('mahasiswa.her-registrasi');
    }

    /**
     * Tampilkan halaman IRS dengan jadwal kuliah.
     */
    public function akademikIRS()
    {
        $jadwal = JadwalKuliah::all(); // Fetch all data from jadwal_kuliah table
        return view('mahasiswa.irs', compact('jadwal')); // Pass data to the view
    }
}
