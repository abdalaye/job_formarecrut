<?php

namespace Database\Factories;

use App\Models\Candidat;
use App\Models\Competence;
use App\Models\NiveauCompetence;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Competence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'niveau_competence_id' => NiveauCompetence::factory(),
            'candidat_id' => Candidat::pluck('id')->random(),
        ];
    }
}
