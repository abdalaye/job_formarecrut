<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profils')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Candidat'
            ],
            [
                'id' => 2,
                'name' => 'Recruteur'
            ],
            [
                'id' => 3,
                'name' => 'Administrateur'
            ],
        ]);
    }
}
