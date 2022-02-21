<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('niveau_competence_id');
            $table->foreignId('candidat_id');
            $table->timestamps();

            $table->foreign('niveau_competence_id')
                ->references('id')
                ->on('niveau_competences')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('candidat_id')
                ->references('id')
                ->on('candidats')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competences');
    }
}
