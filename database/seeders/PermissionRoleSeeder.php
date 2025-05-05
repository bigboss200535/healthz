<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermissionRole;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = PermissionRole::create([
            'role_id' => '0',
            'role_name' => 'DASHBOARD MANAGEMENT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '1',
            'role_name' => 'PATIENT MANAGEMENT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '2',
            'role_name' => 'NURSES MANAGEMENT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '3',
            'role_name' => 'OUT PATIENT MANAGEMENT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '4',
            'role_name' => 'IN PATIENT MANAGEMENT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '5',
            'role_name' => 'INVESTIGATIONS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '6',
            'role_name' => 'REVENUE',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '7',
            'role_name' => 'STORE',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '8',
            'role_name' => 'CLAIMS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '9',
            'role_name' => 'PHARMACY ',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '10',
            'role_name' => 'NOTIFICATIONS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '11',
            'role_name' => 'SYSTEM SETUP',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $role = PermissionRole::create([
            'role_id' => '12',
            'role_name' => 'REPORTS',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
