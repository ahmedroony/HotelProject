<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'room_number' => '101',
                'room_type_id' => 1, // Standard Room
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '102',
                'room_type_id' => 1, // Standard Room
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '201',
                'room_type_id' => 2, // Deluxe Room
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '202',
                'room_type_id' => 2, // Deluxe Room
                'status' => 'maintenance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '301',
                'room_type_id' => 3, // Family Suite
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '401',
                'room_type_id' => 4, // Presidential Suite
                'status' => 'occupied',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
