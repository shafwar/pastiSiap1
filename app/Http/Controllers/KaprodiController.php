<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKuliah;
use App\Models\MataKuliah;

class KaprodiController extends Controller
{
    /**
     * Menampilkan halaman jadwal kuliah.
     */
    public function jadwalKuliah()
{
    $jadwal = JadwalKuliah::where('status', 'draft')->get();
    
    // Fetch mata kuliah with ruang data
    $mataKuliah = MataKuliah::with('ruang')->get(['mata_kuliah_name', 'mata_kuliah_id', 'sks', 'ruang']);

    return view('kaprodi.jadwal-kuliah', compact('jadwal', 'mataKuliah'));
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
        $data = $request->input('schedule');

        try {
            foreach ($data as $item) {
                // Find MataKuliah details
                $mataKuliah = MataKuliah::where('mata_kuliah_name', $item['mata_kuliah'])->first();

                if ($mataKuliah) {
                    JadwalKuliah::create([
                        'mata_kuliah' => $mataKuliah->mata_kuliah_name,
                        'day' => $item['day'],
                        'time' => $item['time'],
                        'sks' => $mataKuliah->sks,
                        'ruang' => $mataKuliah->ruang,
                        'status' => 'pending'
                    ]);
                }
            }

            return response()->json(['message' => 'Jadwal has been sent for approval.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to submit schedule. ' . $e->getMessage()], 500);
        }
    }

    }
