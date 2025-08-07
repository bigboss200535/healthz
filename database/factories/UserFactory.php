<?php

namespace Database\Factories;

use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role = UserRole::inRandomOrder()->first(); 

        return [
            'user_id' => Str::uuid(),
            'username' => $this->faker->userName,
            'title' => $this->faker->randomElement(['Mrs', 'Mr']),
            'firstname' => $this->faker->firstName,
            'othername' => $this->faker->lastName,
            'telephone' => $this->faker->phoneNumber,
            'gender_id' => $this->faker->randomElement(['2', '3']),
            'added_date' => now(),
            'email_verified' => 'No',
            'user_roles_id' => $role->role_id,
            'facility_id' => 'FAC000001',
            'mode' => $this->faker->randomElement(['New', 'Old']),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'oldpassword' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}
