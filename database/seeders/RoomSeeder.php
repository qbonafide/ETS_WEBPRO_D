<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'name_rooms'    => 'Individual Desk',
                'room_type_id'  => 1,
                'capacity'      => 1,
                'facilities'    => 'Single desk with power outlet',
                'price_per_hour'=> 4000,
                'status'        => 'available',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name_rooms'    => 'Group Desk',
                'room_type_id'  => 2,
                'capacity'      => 10,
                'facilities'    => 'Shared table for group work',
                'price_per_hour'=> 35000,
                'status'        => 'available',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name_rooms'    => 'VIP Room',
                'room_type_id'  => 3,
                'capacity'      => 4,
                'facilities'    => 'Private room with AC and projector',
                'price_per_hour'=> 50000,
                'status'        => 'available',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
