<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class CollaborateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)
                        ->has(\App\Models\Candidat::factory(1), 'candidat')
                        ->create();


        \App\Models\User::factory()->create([
            'email'    => 'kaiserification@gmail.com',
            'prenom'   => 'Papa Mouhamadou',
            'nom'      => 'DIOP',
            'is_admin' => Profil::ADMINISTRATEUR,
        ]);
    }
}
