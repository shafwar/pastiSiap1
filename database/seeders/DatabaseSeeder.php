<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            // Panggil seeder untuk Dummy Users
            $this->call(DummyUsersSeeder::class);

            // Tambahkan log untuk memastikan seeder berhasil dijalankan
            Log::info('DatabaseSeeder dijalankan. Seeder DummyUsersSeeder berhasil dipanggil.');
        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah saat menjalankan seeder
            Log::error('DatabaseSeeder gagal dijalankan. Error: ' . $e->getMessage());
        }
    }
}
