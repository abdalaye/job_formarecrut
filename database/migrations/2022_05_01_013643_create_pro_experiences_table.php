<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('poste');
            $table->string('employeur');
            $table->string('ville');
            $table->string('debut_mois', 2);
            $table->string('debut_annee', 4);
            $table->string('fin_mois', 2);
            $table->string('fin_annee', 4);
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pro_experiences');
    }
}
