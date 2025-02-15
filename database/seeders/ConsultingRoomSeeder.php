<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\ConsultingRoom;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::inRandomOrder()->first(); 
        $clinic = Clinic::inRandomOrder()->first(); 

        $room = ConsultingRoom::create([
            'consulting_room_id' => '1',
            'consulting_room' => 'CONSULTING ROOM 1',
            'clinic_code' => $clinic->clinic_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $room = ConsultingRoom::create([
            'consulting_room_id' => '2',
            'consulting_room' => 'CONSULTING ROOM 2',
            'clinic_code' => $clinic->clinic_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $room = ConsultingRoom::create([
            'consulting_room_id' => '3',
            'consulting_room' => 'CONSULTING ROOM 3',
            'clinic_code' => $clinic->clinic_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
        
        $room = ConsultingRoom::create([
            'consulting_room_id' => '4',
            'consulting_room' => 'CONSULTING ROOM 4',
            'clinic_code' => $clinic->clinic_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

    }
}
