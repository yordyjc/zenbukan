<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anfitrion_id')->unsigned();
            $table->integer('modalidad_id')->unsigned();
            $table->integer('competidor_id')->unsigned();
            $table->integer('club_id')->unsigned(); //usado para identificar rapidamente el club al que pertenece
            $table->boolean('cabeza_serie')->nullable()->default(0);
            $table->boolean('kata')->default(0);
            $table->boolean('kumite')->default(0);
            $table->integer('edad')->nullable();
            $table->integer('grado')->nullable();
            $table->boolean('estado')->default(false);
            $table->timestamps();
        });

        Schema::table('inscripciones', function($table) {
            $table->foreign('anfitrion_id')->references('id')->on('users');
            $table->foreign('modalidad_id')->references('id')->on('modalidades');
            $table->foreign('competidor_id')->references('id')->on('users');
            $table->foreign('club_id')->references('id')->on('clubes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
