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
            // Jalankan semua seeder yang diperlukan
            $this->call([
                DummyUsersSeeder::class,  // Pastikan file DummyUserSeeder ada
                RuangSeeder::class,      // Pastikan file RuangSeeder ada
            ]);

            // Tambahkan log jika seeding berjalan sukses
            Log::info('DatabaseSeeder selesai dijalankan.');
        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah saat menjalankan seeder
            Log::error('DatabaseSeeder gagal dijalankan. Error: ' . $e->getMessage());
        }
    }
}
