<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('titre');
            $table->string('etablissement');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->longText('description')->nullable();
            $table->boolean('en_cours')->default(false);
            $table->foreignId('country_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->string('country_other')->nullable();
            $table->string('city_other')->nullable();
            $table->foreignId('candidat_id');

            $table->timestamps();

            $table->foreign('candidat_id')
                ->references('id')
                ->on('candidats')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('set null')
                ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations');
    }
}
