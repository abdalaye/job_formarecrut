<?php

namespace Database\Factories;

use App\Models\NiveauEtude;
use Illuminate\Database\Eloquent\Factories\Factory;

class NiveauEtudeFactory extends Factory
{

    protected $model = NiveauEtude::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'statut' => rand(0, 1),
        ];
    }
}
