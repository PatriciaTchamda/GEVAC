<?php

namespace Database\Factories;

use App\Models\Specialites;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialitesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Specialites::class;

    public function definition()
    {
        return [
            'code' => $this->faker->name(),
            'intitule' => $this->faker->lastName(),
            'filieres_id' => rand(1,10),
        ];
    }
}
