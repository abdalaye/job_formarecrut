<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatNiveauCompetencePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidat_niveau_competence', function (Blueprint $table) {
            $table->foreignId('candidat_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('niveau_competence_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('candidat_niveau_competence');
    }
}
