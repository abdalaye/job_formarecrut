<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentreInteretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centre_interets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('candidat_id');
            $table->timestamps();

            $table->foreign('candidat_id')
                ->references('id')
                ->on('candidats')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centre_interets');
    }
}
