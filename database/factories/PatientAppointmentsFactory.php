<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Facility;
use App\Models\Patient;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientAppointmentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $facility = Facility::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $patient = Patient::inRandomOrder()->where('archived', 'No')->first();

        return [
            'appointment_id' => Str::uuid(),
            'patient_id' => $patient->patient_id,
            'opd_number' => $patient->opd_number,
            'facility_id' =>  $facility->facility_id,
            'user_id' =>  $user->user_id,
            'appointment_date' =>  now(),
            'appointment_time' =>  now(),
            'request_date' =>  now(),
         ];
    }
}
