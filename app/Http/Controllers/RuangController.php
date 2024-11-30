<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    /**
     * Menampilkan semua data ruang untuk Bagian Akademik.
     */
    public function index()
    {
        try {
            // Mengambil data dari tabel 'ruangs'
            $ruangs = DB::table('ruangs')->get();

            // Mengirim data ke view
            return view('bagianakd.ruang', compact('ruangs')); // Menampilkan data di view
        } catch (\Exception $e) {
            // Mengirim pesan error jika gagal mengambil data
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data ruang: ' . $e->getMessage()]);
        }
    }

    /**
     * Menampilkan form untuk menambahkan data ruang baru.
     */
    public function create()
    {
        try {
            return view('bagianakd.create'); // Menampilkan form untuk menambah ruang
        } catch (\Exception $e) {
            // Menangani error jika gagal membuka halaman form tambah ruang
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
            // Simpan data ruang baru dengan status 'Pending'
            Ruang::create([
                'kode' => $request->kode,
                'kapasitas' => $request->kapasitas,
                'status' => 'Pending', // Status awal menjadi 'Pending'
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
            // Menangani error jika data ruang tidak ditemukan
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
            $ruang->update([
                'prodi' => $request->prodi,
                'status' => 'Pending', // Ubah status menjadi Pending saat Bagian Akademik mengubah Prodi
            ]);

            return redirect()->route('ruang.index')->with('success', 'Program Studi berhasil diperbarui dan status ruang menjadi Pending.');
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

    /**
     * Menampilkan data ruang dengan status 'Pending' untuk Dekan.
     */
    public function indexForDekan()
    {
        try {
            // Ambil data ruang dengan status 'Pending'
            $ruangs = DB::table('ruangs')->where('status', 'Pending')->get();

            // Kirim data ke view dekan.ruang
            return view('dekan.ruang', compact('ruangs'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data ruang: ' . $e->getMessage()]);
        }
    }

    /**
     * Menangani persetujuan ruang oleh Dekan dan memperbarui statusnya.
     */
    public function approve($id)
    {
        try {
            // Cari ruang berdasarkan ID
            $ruang = Ruang::find($id);

            if (!$ruang) {
                // Jika data tidak ditemukan, beri respons error
                return redirect()->back()->with('error', 'Data ruang tidak ditemukan.');
            }

            // Update status ruang menjadi 'Disetujui'
            $ruang->status = 'Disetujui';
            $ruang->save(); // Simpan perubahan ke database

            // Log perubahan status
            Log::info('Status ruang diperbarui', ['ruang_id' => $ruang->id, 'status' => $ruang->status]);

            // Redirect kembali dengan pesan sukses
            return redirect()->route('dekan.ruang')->with('success', 'Ruang berhasil disetujui!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengubah status ruang: ' . $e->getMessage()]);
        }
    }

    /**
     * Menangani penolakan ruang oleh Dekan dan memperbarui statusnya.
     */
    public function reject($id)
    {
        try {
            // Cari ruang berdasarkan ID
            $ruang = Ruang::find($id);

            if (!$ruang) {
                // Jika data tidak ditemukan, beri respons error
                return redirect()->back()->with('error', 'Data ruang tidak ditemukan.');
            }

            // Update status ruang menjadi 'Ditolak'
            $ruang->status = 'Ditolak';
            $ruang->save(); // Simpan perubahan ke database

            // Log perubahan status
            Log::info('Status ruang diperbarui menjadi Ditolak', ['ruang_id' => $ruang->id, 'status' => $ruang->status]);

            // Redirect kembali dengan pesan sukses
            return redirect()->route('dekan.ruang')->with('success', 'Ruang berhasil ditolak!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengubah status ruang: ' . $e->getMessage()]);
        }
    }

    /**
     * Mengubah status ruang antara 'Disetujui' dan 'Tidak Disetujui' untuk Bagian Akademik.
     */
    public function toggleStatus($id)
    {
        try {
            // Cari ruang berdasarkan ID
            $ruang = Ruang::findOrFail($id);

            // Pastikan hanya Dekan yang bisa mengubah status
            if (auth()->user()->role == 'dekan') {
                // Toggle status ruang antara Disetujui dan Tidak Disetujui
                $ruang->status = ($ruang->status == 'Disetujui') ? 'Tidak Disetujui' : 'Disetujui';
                $ruang->save();

                // Log perubahan status
                Log::info('Status ruang diperbarui', ['ruang_id' => $ruang->id, 'status' => $ruang->status]);

                // Redirect kembali ke halaman index dengan pesan sukses
                return redirect()->route('ruang.index')->with('success', 'Status ruang berhasil diperbarui!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Anda tidak berhak mengubah status ruang ini.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengubah status ruang: ' . $e->getMessage()]);
        }
    }

    /**
     * Menangani pengajuan ulang ruang oleh Bagian Akademik.
     */
    public function ajukanUlang($id)
    {
        try {
            // Cari ruang berdasarkan ID
            $ruang = Ruang::findOrFail($id);

            // Pastikan ruang berada dalam status 'Tidak Disetujui' sebelum dapat diajukan ulang
            if ($ruang->status == 'Tidak Disetujui') {
                // Ubah status ruang menjadi 'Menunggu Persetujuan' untuk pengajuan ulang
                $ruang->status = 'Menunggu Persetujuan';
                $ruang->save(); // Simpan perubahan ke database

                // Log pengajuan ulang ruang
                Log::info('Ruang diajukan ulang untuk persetujuan', ['ruang_id' => $ruang->id]);

                return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diajukan ulang untuk persetujuan.');
            } else {
                return redirect()->route('ruang.index')->withErrors(['error' => 'Ruang ini tidak dapat diajukan ulang, karena statusnya bukan "Tidak Disetujui".']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengajukan ruang ulang: ' . $e->getMessage()]);
        }
    }
}
