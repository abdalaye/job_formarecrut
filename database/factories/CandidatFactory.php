<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Candidat;
use App\Models\Situation;
use App\Models\NiveauEtude;
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
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'telephone' => $this->faker->regexify('^(221)(30|33|70|76|77|78)[0-9]{3}[0-9]{2}[0-9]{2}$'),
            'adresse' => $this->faker->text(14),
            'genre' => rand(1, 2),
            'country_id' => 1,
            'statut' => rand(1, 0),
            'user_id' => User::factory(),
            'niveau_etude_id' => NiveauEtude::pluck('id')->random(),
            'situation_id' => Situation::pluck('id')->random(),
            'annee_experience' => $this->faker->randomElement(range(1, 20)),
            'date_naissance' => now()->subYear($this->faker->randomElement([50, 40, 30, 20])),
            'lieu_naissance' => $this->faker->city(),
            'info' => $this->faker->paragraph(),
        ];
    }
}
