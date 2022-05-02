<?php

namespace Database\Factories;

use App\Models\Abonnement;
use App\Models\User;
use App\Models\Entreprise;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntrepriseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entreprise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->company(),
            'adresse' => $this->faker->address(),
            'description' => $this->faker->paragraph(),
            'n_employers' => $this->faker->numberBetween(0, 100),
            'phone' => $this->faker->regexify('^(00221)(70|76|77|78)[0-9]{3}[0-9]{2}[0-9]{2}$'),
            'ninea' => 'SN-NINEA-' . $this->faker->regexify('^[0-9]{9}$'),
            'rc' => Str::random(80),
            'statut' => $this->faker->numberBetween(0, 1),
            'user_id' => User::factory(),
            'abonnement_id' => Abonnement::factory(),
        ];
    }
}