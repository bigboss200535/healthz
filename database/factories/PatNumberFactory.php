<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $patient = Patient::inRandomOrder()->first();

        return [
            'patient_id' => $patient->patient_id,
            'opd_number' => 'A'.$this->faker->randomNumber(8, true).'/24',
            'clinic_id' => $this->faker->randomElement(['n', 'a']),
            'user_id' =>  $user->user_id,
        ];
    }
}
