<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Age;
use App\Models\User;
use App\Models\Gender;
use App\Models\Clinic;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first(); 
        $gender = Gender::inRandomOrder()->first(); 
        $age = Age::inRandomOrder()->first(); 

        $service = Clinic::create([
            'clinic_id' => 'C01',
            'clinic' => 'General',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C02',
            'clinic' => 'Direct Service',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C03',
            'clinic' => 'Antenatal',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C04',
            'clinic' => 'Postnatal',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C05',
            'clinic' => 'In-patient',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C06',
            'clinic' => 'Physiotherapy',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C07',
            'clinic' => 'Eye',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C08',
            'clinic' => 'Paediatric',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C09',
            'clinic' => 'Gynaecology',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C10',
            'clinic' => 'ENT',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C11',
            'clinic' => 'Dental',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C12',
            'clinic' => 'Medical',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C13',
            'clinic' => 'Diabetic',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C14',
            'clinic' => 'Casualty',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C15',
            'clinic' => 'Psychiatric',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C16',
            'clinic' => 'Maternity',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C17',
            'clinic' => 'Direct Pharmacy',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = Clinic::create([
            'clinic_id' => 'C18',
            'clinic' => 'Art',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

    }
}

