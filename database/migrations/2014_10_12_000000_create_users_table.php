<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->boolean('sexo');//0 mujer, 1 hombre
            //$table->integer('sector_id')->unsigned();
            $table->string('direccion')->nullable();
            $table->date('nacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('tipo')->default(4);//1->admin | 2->inscripciones | 3->Juez | 4->usuario
            $table->string('foto')->nullable();
            $table->text('observaciones')->nullable();

            $table->boolean('confirmado')->default(1); //1 correo confirmado, 0 sin confirmar
            $table->string('confirmacion_code')->nullable();
            $table->boolean('activo')->default(1); //1 activo, 0 baneado
            $table->rememberToken();
            $table->timestamps();
        });

        // Schema::table('users', function($table) {
        //     $table->foreign('sector_id')->references('id')->on('sectores');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
