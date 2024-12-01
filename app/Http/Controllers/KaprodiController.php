<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKuliah;

class KaprodiController extends Controller
{
    /**
     * Menampilkan halaman jadwal kuliah.
     */
    public function jadwalKuliah()
    {
        $jadwal = JadwalKuliah::where('status', 'draft')->get();
        return view('kaprodi.jadwal-kuliah', compact('jadwal'));
    }

    /**
     * Simpan data jadwal kuliah sementara.
     */
    public function saveJadwal(Request $request)
    {
        JadwalKuliah::create([
            'mata_kuliah' => $request->mata_kuliah,
            'day' => $request->day,
            'time' => $request->time,
        ]);

        return response()->json(['success' => 'Jadwal saved temporarily.']);
    }

    /**
     * Kirim jadwal untuk persetujuan Dekan.
     */
    public function sendApproval(Request $request)
{
    $data = $request->input('schedule'); // Get the schedule data from the request

    try {
        // Validate the input data
        $request->validate([
            'schedule.*.mata_kuliah' => 'required|string',
            'schedule.*.day' => 'required|string',
            'schedule.*.time' => 'required|string',
            'schedule.*.status' => 'required|string|in:draft,pending,approved,rejected'
        ]);

        // Insert schedule data into the database
        foreach ($data as $item) {
            JadwalKuliah::create($item);
        }

        return response()->json(['message' => 'Jadwal successfully submitted.'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to submit schedule. ' . $e->getMessage()], 500);
    }
}

    }
