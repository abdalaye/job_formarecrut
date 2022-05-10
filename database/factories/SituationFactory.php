<?php

namespace Database\Factories;

use App\Models\Situation;
use Illuminate\Database\Eloquent\Factories\Factory;

class SituationFactory extends Factory
{
    protected $model = Situation::class;

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
