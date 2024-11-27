<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    /**
     * Menampilkan semua data ruang.
     */
    public function index()
    {
        try {
            // Mengambil data dari tabel 'ruangs'
            $ruangs = DB::table('ruangs')->get();

            // Mengirim data ke view
            return view('bagianakd.ruang', compact('ruangs')); // Menampilkan data di view
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data ruang: ' . $e->getMessage()]);
        }
    }

    /**
     * Menampilkan form untuk menambahkan data ruang baru.
     */
    public function create()
    {
        try {
            return view('bagianakd.create');
        } catch (\Exception $e) {
            return redirect()->route('ruang.index')->withErrors(['error' => 'Gagal membuka halaman tambah ruang: ' . $e->getMessage()]);
        }
    }

    /**
     * Menyimpan data ruang baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data input dari form
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|unique:ruangs,kode|max:10',
            'kapasitas' => 'required|integer|min:1|max:100',
            'prodi' => 'required|string|max:50',
        ], [
            'kode.required' => 'Kode ruang wajib diisi.',
            'kode.unique' => 'Kode ruang sudah ada.',
            'kapasitas.required' => 'Kapasitas wajib diisi.',
            'kapasitas.integer' => 'Kapasitas harus berupa angka.',
            'prodi.required' => 'Prodi wajib diisi.',
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Simpan data ke tabel 'ruangs'
            Ruang::create([
                'kode' => $request->kode,
                'kapasitas' => $request->kapasitas,
                'status' => 'Tidak Disetujui',
                'prodi' => $request->prodi,
            ]);

            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Tangani error jika ada kesalahan saat menyimpan data
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan ruang: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Menampilkan form edit untuk ruang tertentu.
     */
    public function edit($id)
    {
        try {
            $ruang = Ruang::findOrFail($id); // Cari data berdasarkan ID
            return view('bagianakd.edit', compact('ruang')); // Kirim data ke view edit
        } catch (\Exception $e) {
            return redirect()->route('ruang.index')->withErrors(['error' => 'Ruang tidak ditemukan: ' . $e->getMessage()]);
        }
    }

    /**
     * Memperbarui data ruang di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'prodi' => 'required|string|max:255',
        ], [
            'prodi.required' => 'Program Studi wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Cari ruang berdasarkan ID dan update program studi
            $ruang = Ruang::findOrFail($id);
            $ruang->update(['prodi' => $request->prodi]);

            return redirect()->route('ruang.index')->with('success', 'Program Studi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('ruang.index')->withErrors(['error' => 'Gagal memperbarui data ruang: ' . $e->getMessage()]);
        }
    }
    
    /**
     * Menghapus data ruang dari database.
     */
    public function destroy($id)
    {
        try {
            $ruang = Ruang::findOrFail($id); // Cari data berdasarkan ID
            $ruang->delete(); // Hapus data

            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('ruang.index')->withErrors(['error' => 'Gagal menghapus ruang: ' . $e->getMessage()]);
        }
    }
}
