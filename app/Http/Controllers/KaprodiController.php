<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah; // Import MataKuliah model
use App\Models\JadwalKuliah; // Import JadwalKuliah model
use App\Models\DosenPengampu; // Import DosenPengampu model

class KaprodiController extends Controller
{
    // Display Jadwal Kuliah
    public function index()
{
    $mataKuliah = MataKuliah::all();
    $dosenPengampu = DosenPengampu::all();

    // Fetch and group schedules by time slot (jam_mulai)
    $jadwal = JadwalKuliah::with(['mataKuliah', 'dosen'])
        ->orderBy('jam_mulai')
        ->get()
        ->groupBy('jam_mulai');

    return view('kaprodi.jadwal-kuliah', compact('mataKuliah', 'dosenPengampu', 'jadwal'));
}



    // Store Jadwal Kuliah
    public function store(Request $request)
    {
    // Validation
    $validatedData = $request->validate([
        'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
        'dosen_id'       => 'required|exists:dosen_pengampu,id',
        'hari'           => 'required|string',
        'jam_mulai'      => 'required|date_format:H:i',
        'jam_selesai'    => 'required|date_format:H:i|after:jam_mulai',
    ]);

    // Insert to database
    JadwalKuliah::create([
        'mata_kuliah_id' => $validatedData['mata_kuliah_id'],
        'dosen_id'       => $validatedData['dosen_id'],
        'hari'           => $validatedData['hari'],
        'jam_mulai'      => $validatedData['jam_mulai'],
        'jam_selesai'    => $validatedData['jam_selesai'],
    ]);

    return redirect()->route('jadwal.kuliah')->with('success', 'Jadwal berhasil disimpan!');
    }


    // Destroy Jadwal Kuliah
    public function destroy($id)
{
    $jadwal = JadwalKuliah::findOrFail($id);
    $jadwal->delete();

    return redirect()->route('jadwal.kuliah')->with('success', 'Jadwal berhasil dihapus!');
}

}