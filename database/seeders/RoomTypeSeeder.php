<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_types')->insert([
            [
                'name' => 'Standard Room',
                'description' => 'A cozy room with basic amenities, perfect for solo travelers or couples.',
                'price' => 50.00,
                'max_adults' => 2,
                'max_children' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deluxe Room',
                'description' => 'Spacious room with premium furnishings and city view.',
                'price' => 90.00,
                'max_adults' => 2,
                'max_children' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Family Suite',
                'description' => 'Large suite designed for families, includes multiple beds and extra space.',
                'price' => 150.00,
                'max_adults' => 4,
                'max_children' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Presidential Suite',
                'description' => 'Luxurious suite with separate living area, premium services, and panoramic view.',
                'price' => 300.00,
                'max_adults' => 2,
                'max_children' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
