<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;
use App\Models\User;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $facility = Facility::create([
            'facility_id' => 'FAC000001',
            'facility_name' => 'MATER DEI HOSPITAL',
            'nhis_api' => 'Claim Check Code',
            'nhia_url' => 'https://elig.nhia.gov.gh:5000/',
            'nhia_key' => 'hp6658',
            'nhia_secret' => 'ncgxs3',
            'ccc_type' => 'Automatic', //Manual
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
        
    }
}
