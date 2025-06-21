<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttendanceService;
use App\Models\User;
use App\Models\Gender;
use App\Models\Age;

class AttendanceServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::inRandomOrder()->first(); 
        $gender = Gender::inRandomOrder()->first(); 
        $age = Age::inRandomOrder()->first(); 

        $service = AttendanceService::create([
            'att_service_id' => '0001',
            'description' => 'General Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0002',
            'description' => 'Direct Service',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0003',
            'description' => 'Antenatal',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0004',
            'description' => 'Postnatal',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0005',
            'description' => 'In-Patient',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0006',
            'description' => 'Physiotherapy',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0007',
            'description' => 'Eye Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0008',
            'description' => 'Paediatrics',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0009',
            'description' => 'Gynaecology',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0010',
            'description' => 'Ent Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0011',
            'description' => 'Dental Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0012',
            'description' => 'Medical Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0013',
            'description' => 'Paediatric Surgery',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0014',
            'description' => 'Adult Surgery',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0015',
            'description' => 'Labour Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0016',
            'description' => 'Othorpaedics Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0017',
            'description' => 'Urology Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0018',
            'description' => 'Surgical Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0019',
            'description' => 'Dietetic Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0020',
            'description' => 'Specialist Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $service = AttendanceService::create([
            'att_service_id' => '0021',
            'description' => 'Diabetic Consultation',
            'gender_id' => $gender->gender_id,
            'age_id' => $age->age_id,
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
