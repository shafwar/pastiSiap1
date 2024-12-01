<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pembimbingakademikSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mas Pembimbing Akademik',
            'email' => 'pembimbingakademik@gmail.com',
            'password' => Hash::make('123456'), // Ganti dengan password yang diinginkan
            'role' => 'pembimbingakademik',
        ]);
    }
}
