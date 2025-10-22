<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('room_types')->insert([
            ['name' => 'Individual Desk', 'description' => 'Single desk for one person', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Group Desk', 'description' => 'Desk for group collaboration', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'VIP Room', 'description' => 'Private VIP room with AC and projector', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
