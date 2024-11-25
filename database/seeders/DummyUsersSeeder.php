<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data di tabel users
        DB::table('users')->truncate();

        // Daftar data users
        $users = [
            [
                'name' => 'Bagianakd',
                'email' => 'bagianakademik@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'bagianakd',                                                                                      
            ],
            [
                'name' => 'Mas Marketing',
                'email' => 'marketing@gmail.com',
                'password' => Hash::make('password_marketing'),
                'role' => 'marketing',
            ],
            [
                'name' => 'Kaprodi',
                'email' => 'kaprodi@gmail.com',
                'password' => Hash::make('password_kaprodi'),
                'role' => 'kaprodi',
            ],
            [
                'name' => 'Mas Keuangan',
                'email' => 'keuangan@gmail.com',
                'password' => Hash::make('password_keuangan'),
                'role' => 'keuangan',
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Kaprodi User',
                'email' => 'kaprodi@example.com',
                'password' => Hash::make('password'),
                'role' => 'kaprodi',
            ],
            [
                'name' => 'Keuangan User',
                'email' => 'operator@example.com',
                'password' => Hash::make('password'),
                'role' => 'operator',
            ],
            [
                'name' => 'Bagianakd User',
                'email' => 'marketing@example.com',
                'password' => Hash::make('password'),
                'role' => 'marketing',
            ],
        ];

        // Loop untuk memasukkan data jika email belum ada
        foreach ($users as $user) {
            if (!DB::table('users')->where('email', $user['email'])->exists()) {
                DB::table('users')->insert($user);
                Log::info('Data berhasil ditambahkan: ' . $user['email']);
            } else {
                // Log jika email sudah ada
                Log::warning('Email sudah ada: ' . $user['email']);
            }
        }
    }
}
