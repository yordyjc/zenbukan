<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosicioneskataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posicioneskata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inscripcion_id')->unsigned();
            $table->integer('modalidad_id')->unsigned();
            $table->integer('orden')->nullable();
            $table->integer('grupo');
            $table->integer('ronda');
            $table->boolean('flag')->nullable();
            $table->float('puntajeath')->nullable();
            $table->float('puntajetec')->nullable();
            $table->float('puntajefinal')->nullable();
            $table->timestamps();
        });
        Schema::table('posicioneskata', function($table){
            $table->foreign('inscripcion_id')->references('id')->on('inscripciones');
            $table->foreign('modalidad_id')->references('id')->on('modalidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posicioneskata');
    }
}
