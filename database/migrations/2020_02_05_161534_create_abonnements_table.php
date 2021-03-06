<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("type")->default(1); //1 => mensuel 2 => annuel
            $table->text("resume");
            $table->longText("description")->nullable();
            $table->float("price_annuel")->nullable();
            $table->float("price_mensuel")->nullable();
            $table->boolean('statut')->default(1);
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
        Schema::dropIfExists('abonnements');
    }
}
