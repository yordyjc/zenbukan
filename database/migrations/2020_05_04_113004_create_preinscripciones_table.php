<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreinscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preinscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre')->nullable();
            $table->text('celular')->nullable();
            $table->text('email')->nullable();
            $table->text('plan')->nullable();
            $table->boolean('estado')->default(0); //1 atendido, 0 sin atender
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
        Schema::dropIfExists('preinscripciones');
    }
}
