<?php

namespace Database\Seeders;

use App\Models\Age;
use App\Models\ClinicAttendanceType;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ClinicAttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first(); 
        $gender_category = Gender::inRandomOrder()->first(); 
        $age_category = Age::inRandomOrder()->first(); 

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '1',
        //     'attendance_type' => 'Adult Surgery',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '2',
        //     'attendance_type' => 'Antenatal',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '3',
        //     'attendance_type' => 'Dietetic Consultation',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '4',
        //     'attendance_type' => 'Direct Pharmacy',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '5',
        //     'attendance_type' => 'Ent Consultation',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '6',
        //     'attendance_type' => 'Eye Consultation',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '7',
        //     'attendance_type' => 'General Consultation',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '8',
        //     'attendance_type' => 'In-Patient',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '9',
        //     'attendance_type' => 'Medical Consultation',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '10',
        //     'attendance_type' => 'Paediatric Surgery',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '11',
        //     'attendance_type' => 'Specialist',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        // $service = ClinicAttendanceType::create([
        //     'attendance_type_id' => '12',
        //     'attendance_type' => 'Surgical Consultation',
        //     'gender_id' => $gender_category->gender_id,
        //     'age_id' => $age_category->age_id,
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);


    }
}
