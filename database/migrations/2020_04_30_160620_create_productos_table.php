<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('slug')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('foto')->nullable();
            $table->string('youtube')->nullable();
            $table->string('moneda')->nullable(); // S/. o US$
            $table->float('precio')->nullable();
            $table->boolean('oferta')->default(0); //0 sin oferta, 1 con oferta
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
        Schema::dropIfExists('productos');
    }
}
