<?php

namespace Database\Seeders;

use App\Models\Situation;
use Illuminate\Database\Seeder;

class SituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $situations = ['Disponible pour emploi', "À l'écoute d'une nouvelle opportunité"];

        foreach($situations as $situation) {
            Situation::factory()->create(['name' => $situation, 'statut' => '1']);
        }
    }
}
