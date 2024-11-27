<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RuangSeeder extends Seeder
{
    /**
     * List of room data to seed.
     *
     * @var array
     */
    protected $rooms = [
        [
            'kode' => 'A103',
            'kapasitas' => 40,
            'status' => 'Disetujui',
            'prodi' => 'Informatika',
        ],
        [
            'kode' => 'A102',
            'kapasitas' => 40,
            'status' => 'Disetujui',
            'prodi' => 'Sistem Informasi',
        ],
        [
            'kode' => 'A303',
            'kapasitas' => 40,
            'status' => 'Disetujui',
            'prodi' => 'Teknik Elektro',
        ],
        [
            'kode' => 'B301',
            'kapasitas' => 40,
            'status' => 'Disetujui',
            'prodi' => 'Teknik Mesin',
        ],
        [
            'kode' => 'B102',
            'kapasitas' => 40,
            'status' => 'Tidak Disetujui',
            'prodi' => 'Teknik Sipil',
        ],
        [
            'kode' => 'E303',
            'kapasitas' => 40,
            'status' => 'Tidak Disetujui',
            'prodi' => 'Arsitektur',
        ],
        [
            'kode' => 'C101',
            'kapasitas' => 30,
            'status' => 'Tidak Disetujui',
            'prodi' => 'Teknik Lingkungan',
        ],
        [
            'kode' => 'D201',
            'kapasitas' => 25,
            'status' => 'Tidak Disetujui',
            'prodi' => 'Desain Interior',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction(); // Start database transaction

            foreach ($this->rooms as $room) {
                // Validate room code
                if (!$this->isValidRoomCode($room['kode'])) {
                    throw new \Exception("Invalid room code format: {$room['kode']}");
                }

                // Add timestamps to each room data
                $room['created_at'] = now();
                $room['updated_at'] = now();

                // Insert room data
                DB::table('ruangs')->insert($room);
            }

            DB::commit(); // Commit the transaction

            Log::info('Room seeding completed successfully. Total rooms: ' . count($this->rooms));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction if an error occurs
            Log::error('Room seeding failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Validate room code format (Building Letter + Floor Number + Room Number).
     *
     * @param string $code
     * @return bool
     */
    protected function isValidRoomCode(string $code): bool
    {
        // Validate format: Letter A-E + 3 digits (e.g., A101)
        return preg_match('/^[A-E][0-9]{3}$/', $code);
    }
}
