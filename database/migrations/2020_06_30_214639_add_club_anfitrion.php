<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClubAnfitrion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('users',function(Blueprint $table){
            $table->integer('club_id')->unsigned()->after('id');
            $table->integer('anfitrion_id')->unsigned()->after('club_id');
        });
        Schema::table('users', function($table) {
            $table->foreign('club_id')->references('id')->on('clubes');
            $table->foreign('anfitrion_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
