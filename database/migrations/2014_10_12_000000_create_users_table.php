<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password',255);
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->boolean('etat')->default(1);
            $table->boolean('is_admin')->default(0);
            $table->string('email')->unique();
            $table->boolean('first_connexion')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_con')->nullable();
            $table->timestamp('mdp_date')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
