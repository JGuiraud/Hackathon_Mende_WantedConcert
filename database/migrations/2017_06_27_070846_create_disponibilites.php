<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('debut_dispo');
            $table->string('debut_heure');
            $table->string('duree');
            $table->text('commentaire')->nullable();
            $table->integer('capacitegarde_max');
            $table->integer('statut')->default(0);
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
        //
    }
}
