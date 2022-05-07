<?php

namespace Database\Seeders;

use App\Models\NiveauEtude;
use Illuminate\Database\Seeder;

class NiveauEtudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveaux = ['Licence', 'Master', 'Doctorat'];

        foreach($niveaux as $niveau) {
            NiveauEtude::factory()->create(['name' => $niveau, 'statut' => '1']);
        }
    }
}
