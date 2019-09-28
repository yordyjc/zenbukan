<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero')->unsigned();
            $table->integer('ficha_id')->unsigned();
            $table->date('fecha')->nullable();

            $table->float('talla')->nullable();
            $table->float('peso')->nullable();
            $table->string('presion')->nullable();
            $table->float('grasa')->nullable();
            $table->float('ritmo')->nullable();

            //monitoreo
            $table->integer('check_monitoreo')->default(0); //0 no realizado, 1 completo, 2 faltan datos
            $table->float('pecho')->nullable();
            $table->float('espalda')->nullable();
            $table->float('hombros')->nullable();
            $table->float('biceps')->nullable();
            $table->float('cintura')->nullable();
            $table->float('gluteos')->nullable();
            $table->float('pierna')->nullable();
            $table->float('pantorrilla')->nullable();
            $table->text('obs_monitoreo')->nullable();

            //examen fisico
            $table->integer('check_fisico')->default(0); //0 no realizado, 1 completo, 2 faltan datos
            $table->integer('planchas')->default(0);
            $table->integer('sentadillas')->default(0);
            $table->integer('abdominales')->default(0);
            $table->text('obs_fisico')->nullable();

            $table->integer('tipo')->unsigned()->default(1); //1 normal, modelo
            $table->boolean('estado')->default(1); // activo
            $table->timestamps();
        });

        Schema::table('periodos', function($table) {
            $table->foreign('ficha_id')->references('id')->on('fichas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodos');
    }
}
