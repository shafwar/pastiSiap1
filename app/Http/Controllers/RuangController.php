<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang; // Pastikan model Ruang diimport
use Illuminate\Support\Facades\DB; // Import DB untuk query builder
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    /**
     * Menampilkan semua data ruang.
     */
    public function index()
    {
        try {
            // Mengambil data dari tabel 'ruangs' menggunakan Query Builder
            $ruangs = DB::table('ruangs')->get();

            // Mengirim data ke view
            return view('bagianakd.ruang', compact('ruangs')); // Menampilkan data di view

        } catch (\Exception $e) {
            // Tangani error jika terjadi kesalahan saat mengambil data
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
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:ruangs,kode|max:10',
            'kapasitas' => 'required|integer|min:1|max:100',
            'status' => 'required|in:Tersedia,Belum Disetujui',
            'lantai' => 'required|integer|min:1',
            'jenis_ruang' => 'required|string|max:255',
            // Hapus validasi fasilitas dan last_maintenance
        ], [
            'kode.required' => 'Kode ruang wajib diisi.',
            'kode.unique' => 'Kode ruang sudah ada.',
            'kapasitas.required' => 'Kapasitas wajib diisi.',
            'kapasitas.integer' => 'Kapasitas harus berupa angka.',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
            'lantai.required' => 'Lantai wajib diisi.',
            'jenis_ruang.required' => 'Jenis ruang wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Simpan data ke database tanpa fasilitas dan last_maintenance
            $data = $request->except(['fasilitas', 'last_maintenance']); // Menghapus fasilitas dan last_maintenance
            Ruang::create($data);
            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambahkan.');
        } catch (\Exception $e) {
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
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:10|unique:ruangs,kode,' . $id,
            'kapasitas' => 'required|integer|min:1|max:100',
            'status' => 'required|in:Tersedia,Belum Disetujui',
            'lantai' => 'required|integer|min:1',
            'jenis_ruang' => 'required|string|max:255',
            // Hapus validasi fasilitas dan last_maintenance
        ], [
            'kode.required' => 'Kode ruang wajib diisi.',
            'kode.unique' => 'Kode ruang sudah ada.',
            'kapasitas.required' => 'Kapasitas wajib diisi.',
            'kapasitas.integer' => 'Kapasitas harus berupa angka.',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
            'lantai.required' => 'Lantai wajib diisi.',
            'jenis_ruang.required' => 'Jenis ruang wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Update data di database tanpa fasilitas dan last_maintenance
            $ruang = Ruang::findOrFail($id);
            $data = $request->except(['fasilitas', 'last_maintenance']); // Menghapus fasilitas dan last_maintenance
            $ruang->update($data);
            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui ruang: ' . $e->getMessage()])->withInput();
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

            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('ruang.index')->withErrors(['error' => 'Gagal menghapus ruang: ' . $e->getMessage()]);
        }
    }
}
