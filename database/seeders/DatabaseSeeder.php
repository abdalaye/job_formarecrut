<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            NiveauCompetenceSeeder::class,
            NiveauEtudeSeeder::class,
            SituationSeeder::class,
            ProfilSeeder::class,
            // TypeFieldsSeeder::class,
            StatutDocumentSeeder::class,
            CollaborateurSeeder::class,
            CandidatSeeder::class,
            AbonnementSeeder::class,
            EntrepriseSeeder::class,
        ]);
    }
}
