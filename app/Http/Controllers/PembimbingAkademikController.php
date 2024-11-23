<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembimbingAkademikController extends Controller
{
    /**
     * Display the Pembimbing Akademik dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // You can pass data to the view if needed
        return view('akademik.pembimbingakademik');
    }

    public function verifikasiIrs()
{
    // Example data to simulate fetching from a database
    $students = [
        ['no' => 1, 'name' => 'Budi', 'nim' => '240601221507', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 20, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Abdul', 'nim' => '240601221508', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Muni', 'nim' => '240601221502', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Jaji', 'nim' => '240601221501', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Mudul', 'nim' => '240601221218', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Loni', 'nim' => '240601221528', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Kao', 'nim' => '240601221318', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Judu', 'nim' => '240601221038', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Abdwa', 'nim' => '240601221512', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Lipa', 'nim' => '240601221123', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],
        ['no' => 2, 'name' => 'Fujia', 'nim' => '2406012213121', 'angkatan' => 2022, 'status' => 'Aktif', 'semester' => 5, 'sks' => 22, 'approval_status' => 'Disetujui'],

        // Add more data as needed
    ];

    return view('akademik.verifikasi_irs', ['students' => $students]);
}

}
