<?php

namespace Database\Factories;

use App\Models\Filieres;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilieresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Filieres::class;

    public function definition()
    {
        return [
            'code' => $this->faker->lastName,
            'intitule' => $this->faker->firstName(),
        ];
    }
}
