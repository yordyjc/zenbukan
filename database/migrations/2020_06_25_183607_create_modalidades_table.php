<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('torneo_id')->unsigned();
            $table->string('nombre')->nullable();
            $table->integer('edad_min')->nullable();
            $table->integer('edad_max')->nullable();
            $table->integer('grado_min')->nullable();
            $table->integer('grado_max')->nullable();
            $table->boolean('sexo');
            $table->string('kata');
            $table->string('kumite');
            $table->boolean('estado');
            $table->timestamps();
        });

        schema::table('modalidades',function($table){
            $table->foreign('torneo_id')->references('id')->on('torneos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidades');
    }
}
