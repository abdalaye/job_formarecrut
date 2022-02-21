<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('countries')->insertOrIgnore(array(
            array('id' => '1','name' => 'Sénégal')
          ));

        DB::table('cities')->insertOrIgnore(array(
            array('id' => '1','country_id' => 1, 'name' => 'Dakar'),
            array('id' => '4','country_id' => 1, 'name' => 'Kaolack'),
            array('id' => '5','country_id' => 1, 'name' => 'Diourbel'),
            array('id' => '6','country_id' => 1, 'name' => 'Fatick'),
            array('id' => '7','country_id' => 1, 'name' => 'Kaffrine'),
            array('id' => '8','country_id' => 1, 'name' => 'Kédougou'),
            array('id' => '9','country_id' => 1, 'name' => 'Kolda'),
            array('id' => '10','country_id' => 1, 'name' => 'Louga'),
            array('id' => '11','country_id' => 1, 'name' => 'Matam'),
            array('id' => '12','country_id' => 1, 'name' => 'Saint-Louis'),
            array('id' => '13','country_id' => 1, 'name' => 'Sédhiou'),
            array('id' => '14','country_id' => 1, 'name' => 'Tambacounda'),
            array('id' => '15','country_id' => 1, 'name' => 'Thiès'),
            array('id' => '16','country_id' => 1, 'name' => 'Ziguinchor')
        ));

        DB::table('secteurs')->insertOrIgnore( array(
            array('id' => '1','name' => 'Agro-alimentaire','statut' => '1','created_at' => NULL,'updated_at' => '2020-12-08 09:56:53'),
            array('id' => '2','name' => 'Assurances','statut' => '1','created_at' => NULL,'updated_at' => '2020-12-08 09:57:15'),
            array('id' => '3','name' => 'TIC','statut' => '1','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => 'Banque','statut' => '1','created_at' => '2020-11-19 16:52:15','updated_at' => '2020-12-08 09:58:51'),
            array('id' => '5','name' => 'Comptabilité & Gestion','statut' => '1','created_at' => '2020-12-08 09:59:06','updated_at' => '2020-12-08 09:59:06'),
            array('id' => '6','name' => 'Immobilier','statut' => '1','created_at' => '2020-12-08 09:59:40','updated_at' => '2020-12-08 09:59:40'),
            array('id' => '7','name' => 'Marketing & Communication','statut' => '1','created_at' => '2020-12-08 10:01:43','updated_at' => '2020-12-08 10:01:43'),
            array('id' => '8','name' => 'Commerce','statut' => '1','created_at' => '2020-12-08 10:01:53','updated_at' => '2021-06-24 15:09:55'),
            array('id' => '9','name' => 'Droit','statut' => '1','created_at' => '2021-06-24 15:09:10','updated_at' => '2021-06-24 15:09:10'),
            array('id' => '10','name' => 'Artisanat','statut' => '1','created_at' => '2021-06-24 15:09:26','updated_at' => '2021-06-24 15:09:26'),
            array('id' => '11','name' => 'Agriculture','statut' => '1','created_at' => '2021-06-24 15:10:17','updated_at' => '2021-06-24 15:10:17'),
            array('id' => '12','name' => 'Maîchage','statut' => '1','created_at' => '2021-06-24 15:10:31','updated_at' => '2021-06-24 15:10:31'),
            array('id' => '13','name' => 'Finances','statut' => '1','created_at' => '2021-06-24 15:12:28','updated_at' => '2021-06-24 15:12:28')
            ));
    }
}
