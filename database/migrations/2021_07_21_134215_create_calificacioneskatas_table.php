<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacioneskatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacioneskatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('posicioneskata_id')->unsigned();
            $table->integer('juez_id')->unsigned();
            $table->float('puntajeTecnico');
            $table->float('puntajeAtletico');
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('calificacioneskatas');
    }
}
