<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('portada')->nullable();
            $table->string('foto')->nullable();
            $table->string('bases')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->float('precio')->default(0);
            $table->string('lugar')->nullable();
            $table->boolean('kata')->nullable()->default(0);
            $table->boolean('kumite')->nullable()->default(0);
            $table->boolean('estado')->default(1); // usado para simular la eliminacion del torneo
            $table->boolean('inscripciones')->default(1);
            $table->boolean('activo')->default(1); // 1 cuando el torneo se esta desarrollando, por ahora le pondre por fecto 1, pero debe habilitarse desde el panel
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
        Schema::dropIfExists('torneos');
    }
}
