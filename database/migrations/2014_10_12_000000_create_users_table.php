<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email unik
            $table->timestamp('email_verified_at')->nullable(); // Waktu verifikasi email (opsional)
            $table->string('password'); // Password
            $table->enum('role', ['bagianakd','pembimbingakademik', 'kaprodi', 'marketing', 'keuangan', 'dekan']) // Role pengguna
                  ->default('bagianakd');
            $table->rememberToken(); // Token untuk "remember me"
            $table->timestamps(); // Created at & Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Hapus tabel jika rollback
    }
};
