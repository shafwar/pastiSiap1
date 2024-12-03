<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mas Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => Hash::make('123456'), // Ganti dengan password yang diinginkan
            'role' => 'mahasiswa',
        ]);
    }
}
