<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang; // Pastikan model Ruang diimport
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    /**
     * Menampilkan daftar semua ruang.
     */
    public function index()
    {
        try {
            // Ambil semua data dari tabel 'ruangs'
            $ruangs = Ruang::all();

            // Kirim data ke view
            return view('akademik.ruang', compact('ruangs'));
        } catch (\Exception $e) {
            // Tangani error jika ada
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data ruang: ' . $e->getMessage()]);
        }
    }

    /**
     * Menampilkan form untuk menambah ruang baru.
     */
    public function create()
    {
        return view('akademik.create');
    }

    /**
     * Menyimpan ruang baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:ruangs,kode|max:10',
            'kapasitas' => 'required|integer|min:1|max:100', // Maksimal kapasitas 100
            'status' => 'required|in:Tersedia,Belum Disetujui',
        ], [
            'kode.required' => 'Kode ruang wajib diisi.',
            'kode.unique' => 'Kode ruang sudah ada.',
            'kapasitas.required' => 'Kapasitas wajib diisi.',
            'kapasitas.integer' => 'Kapasitas harus berupa angka.',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Ruang::create($request->all());
            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan ruang: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Menampilkan form untuk mengedit ruang tertentu.
     */
    public function edit($id)
    {
        try {
            $ruang = Ruang::findOrFail($id);
            return view('akademik.edit', compact('ruang'));
        } catch (\Exception $e) {
            return redirect()->route('ruang.index')->withErrors(['error' => 'Ruang tidak ditemukan: ' . $e->getMessage()]);
        }
    }

    /**
     * Memperbarui data ruang di database.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:10|unique:ruangs,kode,' . $id,
            'kapasitas' => 'required|integer|min:1|max:100',
            'status' => 'required|in:Tersedia,Belum Disetujui',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $ruang = Ruang::findOrFail($id);
            $ruang->update($request->all());
            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui ruang: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Menghapus ruang dari database.
     */
    public function destroy($id)
    {
        try {
            $ruang = Ruang::findOrFail($id);
            $ruang->delete();

            // Atur session untuk header jika diperlukan
            session(['showHeader' => false]);

            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('ruang.index')->withErrors(['error' => 'Gagal menghapus ruang: ' . $e->getMessage()]);
        }
    }
}
