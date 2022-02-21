<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('adresse')->nullable();
            $table->string('photo')->nullable();
            $table->string('telephone')->nullable();
            $table->string('url_cv')-> nullable();
            $table->integer('annee_experience')->default(0);
            $table->string('ville')->nullable();
            $table->integer('genre')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->foreignId('user_id')->unique();
            $table->foreignId('situation_id')->nullable();
            $table->foreignId('niveau_etude_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->tinyInteger('statut')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('niveau_etude_id')->references('id')->on('niveau_etudes')->onDelete('set null')->onUpdate('set null');
            $table->foreign('situation_id')->references('id')->on('situations')->onDelete('set null')->onUpdate('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null')->onUpdate('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null')->onUpdate('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidats');
    }
}
