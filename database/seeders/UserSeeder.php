<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();

        $role = UserRole::inRandomOrder()->first(); 

        $userdata = User::create([
            'user_id' => 'b2c362bf-56df-4337-be34-7062ffae8bd5',
            'username' => 'admin',
            'password'  => '$2y$10$V4.AAnGPPrhLLJsBT28H3.1vF9rpK25BnMr5v420szqNbIWVNq9k6',   //@Mohammed200535
            'oldpassword' => '$2y$10$V4.AAnGPPrhLLJsBT28H3.1vF9rpK25BnMr5v420szqNbIWVNq9k6',   //@Mohammed200535
            'firstname' => 'Mohammed',
            'othername' => 'Alhassan',
            'email' => 'alhassan.mohammedga@gmail.com',
            'telephone' => '0245340461',
            'gender_id' => '2',
            'mode' => 'New',
            'salt' => 'systemsalt',
            'user_roles_id' => 'R1',
            'facility_id' => 'FAC000001',
            'added_id' => 'b2c362bf-56df-4337-be34-7062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);

        $userdata = User::create([
            'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5',
            'username' => 'user',
            'password'  => '$2y$10$V4.AAnGPPrhLLJsBT28H3.1vF9rpK25BnMr5v420szqNbIWVNq9k6',   //@Mohammed200535
            'oldpassword' => '$2y$10$V4.AAnGPPrhLLJsBT28H3.1vF9rpK25BnMr5v420szqNbIWVNq9k6',   //@Mohammed200535
            'firstname' => 'Mohammed',
            'othername' => 'Alhassan',
            'email' => 'bigboss200535@gmail.com',
            'telephone' => '0245340461',
            'gender_id' => '2',
            'mode' => 'New',
            'salt' => 'systemsalt',
            'user_roles_id' => 'R2',
            'facility_id' => 'FAC000001',
            'added_id' => 'b2c362bf-56df-4337-be34-7062ffae8bd5',
            'added_date' => now(),
            'status' => 'Active',
            'archived' => 'No',
        ]);
    }
}
