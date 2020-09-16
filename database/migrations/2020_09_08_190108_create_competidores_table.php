<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competidores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('telefono')->nullable();
            $table->boolean('sexo');//0 mujer, 1 hombre
            $table->date('nacimiento')->nullable();
            $table->integer('sector_id')->unsigned();
            $table->string('direccion')->nullable();
            $table->string('foto')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('activo')->default(1); //1 activo, 0 baneado
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
        Schema::dropIfExists('competidores');
    }
}
