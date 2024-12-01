<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Gender;
use App\Models\Religion;
use App\Models\Title;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $user = User::inRandomOrder()->first();
        $gender = Gender::inRandomOrder()->where('usage','=','1')->first();
        $title = Title::inRandomOrder()->first();
        $religion = Religion::inRandomOrder()->first(); 

        return [
            'patient_id' => Str::uuid(),
            'title_id' => $title->title_id,
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->randomElement(['A.', 'Jackson', '', 'K.', 'Y.', 'Asan', 'T.']),
            'lastname' => $this->faker->lastName,
            'birth_date'=>$this->faker->date('Y-m-d'),
            'gender_id'=>$gender->gender_id,
            'telephone' => $this->faker->phoneNumber,
            'occupation' => $this->faker->randomElement(['Banker', 'Police', 'Other', 'Student']),
            'education' => $this->faker->randomElement(['None', 'JHS/Middle', 'Primary', 'SHS', 'Tertiary', 'Vocational', 'Technical']),
            'religion_id' => $religion->religion_id,
            'nationality' => $this->faker->randomElement(['10001', '20001']),
            'telephone' => $this->faker->phoneNumber(),
            'telephone_verified' => $this->faker->randomElement(['Yes', 'No']),
            'email' => $this->faker->email(),
            'address' => $this->faker->city(),
            'contact_person' => $this->faker->firstName,
            'contact_telephone' => $this->faker->phoneNumber,
            'contact_relationship' => $this->faker->colorName(),
            // 'contact_relationship' => $this->faker->city(),
            'user_id' =>  $user->user_id,
            // 'remember_token' => Str::random(10),
        ];
    }
}
