<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaprodiSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mas Kaprodi',
            'email' => 'kaprodi@gmail.com',
            'password' => Hash::make('password_kaprodi'), // Ganti dengan password yang diinginkan
            'role' => 'kaprodi',
        ]);
    }
}
