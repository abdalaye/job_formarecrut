<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobilites', function (Blueprint $table) {
            $table->id();
            $table->foreignId("candidat_id");
            $table->foreignId("country_id");
            $table->timestamps();

            //Foreign IDS
            $table->foreign("candidat_id")->references("id")->on("candidats")->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("country_id")->references("id")->on("countries")->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobilites');
    }
}
