<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Occupation;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupation = Occupation::create([
            'occupation_id' => 'OO001',
            'occupation' => 'BANKER',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO002',
            'occupation' => 'STUDENT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO003',
            'occupation' => 'APPRENTICE',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO004',
            'occupation' => 'CIVIL SERVANT',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO005',
            'occupation' => 'BUSINESS MAN',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO006',
            'occupation' => 'BUSINESS WOMAN',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO007',
            'occupation' => 'TRADER',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO008',
            'occupation' => 'UNEMPLOYED',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO009',
            'occupation' => 'TEACHER',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO010',
            'occupation' => 'DOCTOR',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $occupation = Occupation::create([
            'occupation_id' => 'OO011',
            'occupation' => 'NURSE',
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
