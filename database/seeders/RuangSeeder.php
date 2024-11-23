<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuangSeeder extends Seeder
{
    public function run()
    {
        DB::table('ruangs')->insert([
            [
                'kode' => 'A101',
                'kapasitas' => 40,
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A102',
                'kapasitas' => 35,
                'status' => 'Belum Disetujui',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
