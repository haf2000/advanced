<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('nom');
            $table->string('prenom');
            $table->date('date'); 
            $table->time('heure_debut');
            $table->time('heure_fin');
             $table->string('email');
            $table->string('nom_event');
            $table->string('description');
            $table->boolean('refusee')->default(false);
            $table->boolean('acceptee')->default(false);
            $table->boolean('annulee')->default(false);
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
        Schema::dropIfExists('reservations');
    }
}
