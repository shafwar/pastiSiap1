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
        return view('dekan.approvals');
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

    public function approveRuang($id)
    {
        try {
            // Cari ruang berdasarkan ID dan ubah status menjadi 'Disetujui'
            $ruang = Ruang::findOrFail($id);
            $ruang->update(['status' => 'Disetujui']);

            return redirect()->route('dekan.ruang')->with('success', 'Ruang berhasil disetujui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menyetujui ruang: ' . $e->getMessage()]);
        }
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
    public function approveAllJadwal()
{
    try {
        JadwalKuliah::where('status', '!=', 'approved')->update(['status' => 'approved']);
        return redirect()->route('dekan.jadwal')->with('success', 'Semua jadwal berhasil disetujui.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Gagal menyetujui jadwal: ' . $e->getMessage()]);
    }
}

public function rejectAllJadwal()
{
    try {
        JadwalKuliah::where('status', '!=', 'rejected')->update(['status' => 'rejected']);
        return redirect()->route('dekan.jadwal')->with('success', 'Semua jadwal berhasil ditolak.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Gagal menolak jadwal: ' . $e->getMessage()]);
    }
}

public function approveAllRuang()
{
    try {
        Ruang::where('status', '!=', 'Disetujui')->update(['status' => 'Disetujui']);
        return redirect()->route('dekan.ruang')->with('success', 'Semua ruang berhasil disetujui.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Gagal menyetujui ruang: ' . $e->getMessage()]);
    }
}

public function rejectAllRuang()
{
    try {
        Ruang::where('status', '!=', 'Ditolak')->update(['status' => 'Ditolak']);
        return redirect()->route('dekan.ruang')->with('success', 'Semua ruang berhasil ditolak.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Gagal menolak ruang: ' . $e->getMessage()]);
    }
}

}
