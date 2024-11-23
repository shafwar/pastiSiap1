<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;  

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel 'ruangs'.
     */
    public function up(): void
    {
        Schema::create('ruangs', function (Blueprint $table) {
            $table->id(); // Primary key (ID)
            $table->string('kode'); // Kode ruang, misalnya A101
            $table->integer('kapasitas'); // Kapasitas ruang, misalnya 40
            $table->enum('status', ['Tersedia', 'Belum Disetujui']); // Status ruang
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Hapus tabel 'ruangs' jika rollback dilakukan.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangs');
    }
}; 
