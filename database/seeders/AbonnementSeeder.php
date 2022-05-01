<?php

namespace Database\Seeders;

use App\Models\Abonnement;
use Illuminate\Database\Seeder;

class AbonnementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Abonnement::factory(50)->create();
    }
}
