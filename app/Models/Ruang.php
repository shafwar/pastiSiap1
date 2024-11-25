<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     *
     * Jika nama tabel berbeda dari nama model (plural), tentukan di sini.
     */
    protected $table = 'ruangs';

    /**
     * Kolom-kolom yang dapat diisi (mass-assignable).
     */
    protected $fillable = [
        'kode',        // Kode ruang, misalnya A101
        'kapasitas',   // Kapasitas ruang, misalnya 40
        'status',      // Status ruang, misalnya Tersedia atau Belum Disetujui
    ];

    /**
     * Kolom-kolom yang seharusnya diabaikan saat serialisasi.
     * (Biasanya digunakan untuk menyembunyikan data sensitif)
     */
    protected $hidden = [];

    /**
     * Kolom dengan tipe datetime.
     *
     * Secara default, Laravel menganggap `created_at` dan `updated_at` sebagai kolom waktu.
     * Jika Anda ingin menonaktifkan timestamps, tambahkan properti `$timestamps = false`.
     */
    public $timestamps = true;
}
