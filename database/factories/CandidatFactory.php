<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Candidat;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'telephone' => $this->faker->randomNumber(9),
            'adresse' => $this->faker->text(14),
            'genre' => rand(1, 2),
            'country_id' => 1,
            'statut' => rand(1, 0),
            'user_id' => User::factory(),
            'date_naissance' => $this->faker->date()
        ];
    }
}
