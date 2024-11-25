<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class RuangSeeder extends Seeder
{
    /**
     * List of possible room statuses
     * @var array
     */
    protected $statuses = ['Tersedia', 'Belum Disetujui', 'Dalam Perbaikan', 'Digunakan'];

    /**
     * List of possible building codes
     * @var array
     */
    protected $buildings = ['A', 'B', 'C', 'D', 'E'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Existing data with additional metadata
        $existingRooms = [
            [
                'kode' => 'A103',
                'kapasitas' => 40,
                'status' => 'Tersedia',
                'lantai' => 1,
                'jenis_ruang' => 'Kelas Reguler',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A102',
                'kapasitas' => 40,
                'status' => 'Belum Disetujui',
                'lantai' => 1,
                'jenis_ruang' => 'Kelas Reguler',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'A303',
                'kapasitas' => 40,
                'status' => 'Tersedia',
                'lantai' => 3,
                'jenis_ruang' => 'Laboratorium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'B301',
                'kapasitas' => 40,
                'status' => 'Belum Disetujui',
                'lantai' => 3,
                'jenis_ruang' => 'Kelas Reguler',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'B102',
                'kapasitas' => 40,
                'status' => 'Belum Disetujui',
                'lantai' => 1,
                'jenis_ruang' => 'Auditorium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'E303',
                'kapasitas' => 40,
                'status' => 'Tersedia',
                'lantai' => 3,
                'jenis_ruang' => 'Kelas Reguler',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Additional new rooms
        $additionalRooms = [
            [
                'kode' => 'C101',
                'kapasitas' => 30,
                'status' => 'Tersedia',
                'lantai' => 1,
                'jenis_ruang' => 'Kelas Multimedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'D201',
                'kapasitas' => 25,
                'status' => 'Dalam Perbaikan',
                'lantai' => 2,
                'jenis_ruang' => 'Lab Komputer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        try {
            // Combine existing and new rooms
            $allRooms = array_merge($existingRooms, $additionalRooms);

            // Insert all rooms in a transaction
            DB::beginTransaction();

            foreach ($allRooms as $room) {
                // Validate room code format
                if (!$this->isValidRoomCode($room['kode'])) {
                    throw new \Exception("Invalid room code format: {$room['kode']}");
                }

                // Insert room data
                DB::table('ruangs')->insert($room);
            }

            DB::commit();
            
            // Log success message
            Log::info('Room seeding completed successfully. Total rooms: ' . count($allRooms));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Room seeding failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Validate room code format (Building Letter + Floor Number + Room Number)
     *
     * @param string $code
     * @return bool
     */
    protected function isValidRoomCode($code)
    {
        // Format validation: Letter + 3 digits
        return preg_match('/^[A-E][0-9]{3}$/', $code) 
            && in_array(substr($code, 0, 1), $this->buildings);
    }
}
