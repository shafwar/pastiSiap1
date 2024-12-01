<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembimbingAkademikController extends Controller
{


    /**
     * Tampilkan halaman verifikasi IRS.
     */
    public function verifikasiIRS()
    {
        // Contoh data mahasiswa untuk testing
        $students = [
            [
                'id' => 1,
                'nama' => 'Harry Potter',
                'nim' => '12345678',
                'angkatan' => '2020',
                'status_mahasiswa' => 'Aktif',
                'semester' => 5,
                'sks' => 18,
                'status' => 'Belum Disetujui',
                'status_color' => 'warning',
            ],
            [
                'id' => 2,
                'nama' => 'Hermione Granger',
                'nim' => '87654321',
                'angkatan' => '2020',
                'status_mahasiswa' => 'Aktif',
                'semester' => 5,
                'sks' => 20,
                'status' => 'Disetujui',
                'status_color' => 'success',
            ],
            [
                'id' => 3,
                'nama' => 'Ron Weasley',
                'nim' => '45678912',
                'angkatan' => '2020',
                'status_mahasiswa' => 'Aktif',
                'semester' => 5,
                'sks' => 15,
                'status' => 'Tidak Disetujui',
                'status_color' => 'danger',
            ],
        ];

        // Kirim data mahasiswa ke view
        return view('pembimbingakademik.verifikasi-irs', compact('students'));
    }
}
