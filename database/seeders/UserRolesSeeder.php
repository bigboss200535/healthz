<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $titledata = UserRole::create([
            'user_roles_id' => 'R1',
            'role_type' => 'DEVELOPER',
            'usage' => '1',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R2',
            'role_type' => 'SYSTEM ADMINISTRATOR',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R3',
            'role_type' => 'IT OFFICER',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R4',
            'role_type' => 'Claim Officer',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R5',
            'role_type' => 'Hospital Administrator',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R6',
            'role_type' => 'Chief Executive Officer',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R7',
            'role_type' => 'Accounts Officer',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R8',
            'role_type' => 'Accountant',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R9',
            'role_type' => 'Nurse',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R10',
            'role_type' => 'Doctors',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R11',
            'role_type' => 'Data Entry Clerk',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R12',
            'role_type' => 'Opd Clerk',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R13',
            'role_type' => 'Auditor',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R14',
            'role_type' => 'Store Manager',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R15',
            'role_type' => 'Store Keeper',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R16',
            'role_type' => 'Secretary',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'user_roles_id' => 'R17',
            'role_type' => 'Procurement Officer',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
