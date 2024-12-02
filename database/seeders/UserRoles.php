<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $titledata = UserRole::create([
            'role_id' => 'R1',
            'role_name' => 'Developer',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R2',
            'role_name' => 'System Administrator',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R3',
            'role_name' => 'IT Officer',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R4',
            'role_name' => 'Claim Officer',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R5',
            'role_name' => 'Hospital Administrator',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R6',
            'role_name' => 'Hospital Managers',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R7',
            'role_name' => 'Accounts Officer',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R8',
            'role_name' => 'Accountant',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R9',
            'role_name' => 'Nurse',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R10',
            'role_name' => 'Physician Assistant',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $titledata = UserRole::create([
            'role_id' => 'R11',
            'role_name' => 'Medical Doctor',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
