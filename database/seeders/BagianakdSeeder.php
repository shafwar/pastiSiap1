<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BagianakdSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mas Bagianakd',
            'email' => 'bagianakademik@gmail.com',
            'password' => Hash::make('password_bakd'), // Ganti dengan password yang diinginkan
            'role' => 'bagianakd',
        ]);
    }
}
