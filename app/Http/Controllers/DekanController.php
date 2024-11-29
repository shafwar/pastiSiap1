<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
