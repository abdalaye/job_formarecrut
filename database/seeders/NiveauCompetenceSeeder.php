<?php

namespace Database\Seeders;

use App\Models\NiveauCompetence;
use Illuminate\Database\Seeder;

class NiveauCompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(['Moyen', 'Avancé', 'Expert'] as $name) {
            NiveauCompetence::factory()->create(['name' => $name]);
        }
    }
}
