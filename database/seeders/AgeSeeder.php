<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Age;
use App\Models\User;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first(); 

        $age = Age::create([
            'age_id' => '1',
            'age_description' => 'CHILD',
            'min_age' => '0',
            'max_age' => '12',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $age = Age::create([
            'age_id' => '2',
            'age_description' => 'ADULT',
            'min_age' => '13',
            'max_age' => '1000',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $age = Age::create([
            'age_id' => '3',
            'age_description' => 'ALL',
            'min_age' => '0',
            'max_age' => '1000',
            'user_id' => $user->user_id,
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        // $age = Age::create([
        //     'age_id' => '4',
        //     'age_description' => 'INFANT',
        //     'min_age' => '0',
        //     'max_age' => '3',
        //     'user_id' => $user->user_id,
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'Yes',
        // ]);

        // $age = Age::create([
        //     'age_id' => '5',
        //     'age_description' => 'INFANT CHILD',
        //     'min_age' => '0',
        //     'max_age' => '12',
        //     'user_id' => $user->user_id,
        //     'added_date' => now(),
        //     'status' => 'Active',
        //     'archived' => 'Yes',
        // ]);

    }
}
