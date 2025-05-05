<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permissions;
use Illuminate\Support\Str;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permissions::create([
            'permission_id' => 'p1',
            'role_id' => '0',
            'permission_name' => 'DASHBOARD ACCESS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p2',
            'role_id' => '1',
            'permission_name' => 'PATIENT REGISTRATION',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p3',
            'role_id' => '1',
            'permission_name' => 'PATIENT SEARCH',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p4',
            'role_id' => '1',
            'permission_name' => 'PATIENT MODIFY',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p5',
            'role_id' => '1',
            'permission_name' => 'PATIENT SPONSORS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p6',
            'role_id' => '1',
            'permission_name' => 'PATIENT ATTENDANCE',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p7',
            'role_id' => '2',
            'permission_name' => 'VITAL SIGNS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p8',
            'role_id' => '2',
            'permission_name' => 'NURSE NOTES',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p9',
            'role_id' => '2',
            'permission_name' => '24 HOUR REPORT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p10',
            'role_id' => '2',
            'permission_name' => 'IN PATIENT MEDICATIONS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p11',
            'role_id' => '2',
            'permission_name' => 'WARD TRANSFER',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p12',
            'role_id' => '2',
            'permission_name' => 'FLUID INPUT/OUTPUT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p13',
            'role_id' => '2',
            'permission_name' => 'NURSES CARE PLAN',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p14',
            'role_id' => '3',
            'permission_name' => 'OUT PATIENT PRESCRIPTIONS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p15',
            'role_id' => '4',
            'permission_name' => 'CONSULTATIONS (IN-PATIENT)',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p16',
            'role_id' => '4',
            'permission_name' => 'SURGERIES',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
        
        $permissions = Permissions::create([
            'permission_id' => 'p17',
            'role_id' => '4',
            'permission_name' => 'DISCHARGES',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p18',
            'role_id' => '4',
            'permission_name' => 'IN PATIENT PRESCRIPTIONS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p19',
            'role_id' => '5',
            'permission_name' => 'INVESTIGATIONS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p20',
            'role_id' => '5',
            'permission_name' => 'IMAGING',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p21',
            'role_id' => '6',
            'permission_name' => 'INVOICE',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p22',
            'role_id' => '6',
            'permission_name' => 'PAY BILL',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        // $permissions = Permissions::create([
        //     'permission_id' => 'p23',
        //     'role_id' => '6',
        //     'permission_name' => 'INVOICES',
        //     'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'No',
        // ]);

        $permissions = Permissions::create([
            'permission_id' => 'p23',
            'role_id' => '7',
            'permission_name' => 'DISPENSING',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p24',
            'role_id' => '7',
            'permission_name' => 'PRESCRIPTIONS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p25',
            'role_id' => '7',
            'permission_name' => 'RETURN MEDICATION',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p26',
            'role_id' => '8',
            'permission_name' => 'CLAIMS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p41',
            'role_id' => '8',
            'permission_name' => 'NHIS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p27',
            'role_id' => '8',
            'permission_name' => 'PRIVATE',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p28',
            'role_id' => '8',
            'permission_name' => 'CASH',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p29',
            'role_id' => '8',
            'permission_name' => 'CO-OPERATE',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p30',
            'role_id' => '10',
            'permission_name' => 'NOTIFICATIONS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $permissions = Permissions::create([
            'permission_id' => 'p31',
            'role_id' => '10',
            'permission_name' => 'NOTIFICATIONS SETUP',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
