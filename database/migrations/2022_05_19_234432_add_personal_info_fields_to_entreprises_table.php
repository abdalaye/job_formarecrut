<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonalInfoFieldsToEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->string('prenom')->nullable();
            $table->string('nomfamille')->nullable();
            $table->string('email')->nullable();
            $table->string('gender', 3)->nullable();
            $table->string('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->dropColumn('prenom');
            $table->dropColumn('nomfamille');
            $table->dropColumn('email');
            $table->dropColumn('gender');
            $table->dropColumn('password');
        });
    }
}
