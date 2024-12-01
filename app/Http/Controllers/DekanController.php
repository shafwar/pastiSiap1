<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKuliah;
use App\Models\Ruang;

class DekanController extends Controller
{
    public function index()
    {
        return view('dekan.dashboard');
    }

    public function ruang()
    {
        // Ambil data ruangan dari database
        $ruangs = Ruang::all();
        return view('dekan.ruang', compact('ruangs'));
    }

    public function approvals()
    {
        // Ambil semua jadwal kuliah dengan status "Pending"
        $jadwals = JadwalKuliah::where('status', 'pending')->get();
        return view('dekan.approvals', compact('jadwals'));
    }

    public function kuliah()
    {
        // Fetch all schedules
        $kuliah = JadwalKuliah::all();

        // Group the schedules by 'day'
        $groupedByDay = $kuliah->groupBy('day');

        // Pass the grouped schedules to the view
        return view('dekan.kuliah', compact('groupedByDay'));
    }

    public function approveJadwal($id)
    {
        try {
            // Find the schedule by ID and change the status to 'Approved'
            $jadwal = JadwalKuliah::findOrFail($id);
            $jadwal->update(['status' => 'approved']);

            return redirect()->route('dekan.jadwal')->with('success', 'Jadwal berhasil disetujui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menyetujui jadwal: ' . $e->getMessage()]);
        }
    }

    public function rejectJadwal($id)
    {
        try {
            // Find the schedule by ID and change the status to 'Rejected'
            $jadwal = JadwalKuliah::findOrFail($id);
            $jadwal->update(['status' => 'rejected']);

            return redirect()->route('dekan.jadwal')->with('success', 'Jadwal berhasil ditolak.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menolak jadwal: ' . $e->getMessage()]);
        }
    }
}
