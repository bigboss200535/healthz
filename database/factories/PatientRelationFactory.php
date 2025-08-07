<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Relation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientRelationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $relation = Relation::inRandomOrder()->first();

        return [
            'relation_name' => $this->faker->firstName,
            'relation_id' => $relation->relation_id,
            'telephone' => $this->faker->phoneNumber,
        ];
    }
}
