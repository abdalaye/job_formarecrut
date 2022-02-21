<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNatureContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nature_contrats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_contrat_id');
            $table->foreignId('candidat_id');
            $table->timestamps();

            $table->foreign('type_contrat_id')
            ->references('id')
            ->on('type_contrats')
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
        Schema::dropIfExists('nature_contrats');
    }
}
