<?php

namespace Database\Factories;

use App\Models\Abonnement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbonnementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Abonnement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->numberBetween(1, 10),
            'resume' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(),
            'price_annuel' => $this->faker->numberBetween(100_000, 1_000_000),
            'price_mensuel' => $this->faker->numberBetween(100_000, 1_000_000),
            'statut' => (bool) $this->faker->numberBetween(0, 1),
        ];
    }
}
