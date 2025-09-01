<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Sponsors;
use App\Models\SponsorType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PatientSponsor;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientSponsor>
 */
class PatientSponsorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $patient = Patient::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $sponsors = Sponsors::inRandomOrder()->first();
        $sponsor_type = SponsorType::inRandomOrder()->first();

        return [
            'patient_id' => $patient->patient_id,
            'opd_number' => $patient->opd_number,
            'member_no' => $this->faker->randomNumber(8, true),
            'sponsor_id' => $sponsors->sponsor_id,
            // 'sponsor_type_id' => function () {
            //     return \App\Models\SponsorType::factory()->create()->sponsor_type_id;
            // },
            'sponsor_type_id' => $sponsor_type->sponsor_type_id,
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date'=>$this->faker->date('Y-m-d'),
            'priority' => $this->faker->randomElement(['1', '2']),
            'is_active' => $this->faker->randomElement(['1', '2']),
            'user_id' =>  $user->user_id,
        ];
    }
}
