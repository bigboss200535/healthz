<?php

namespace Database\Factories;

use App\Models\Age;
use App\Models\Gender;
use App\Models\Patient;
use App\Models\Services;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientAttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $age = Age::inRandomOrder()->first();
        $gender = Gender::inRandomOrder()->where('usage','=','1')->first();
        $patient = Patient::inRandomOrder()->where('archived', '=', 'No')->first();
        $services = Services::inRandomOrder()->where('archived', '=', 'No')->first();

       return [
            'patient_id' =>  $patient->patient_id,
            'attendance_date'=> now(),
            'attendance_time' => now(),
            'pat_age' => Str::random(2),
            'reg_type'=> $this->faker->randomElement(['New', 'Old']),
            'service_type' => $services->service,
            'membership_number' => Str::random(8),
            'insured' => $this->faker->randomElement(['Yes', 'No']),
            'claims_check_code' => Str::random(5),
            // 'claims_check_code' => $this->faker->phoneNumber,
            'age_id' => $this->faker->randomElement(['2', '3']),
            'gender_id' => $this->faker->randomElement(['2', '3']),
            'user_id' =>  $user->user_id,
            // 'remember_token' => Str::random(5),
        ];
    }
}
