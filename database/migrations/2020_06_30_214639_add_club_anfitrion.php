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
        });
        Schema::table('users', function($table) {
            $table->foreign('club_id')->references('id')->on('clubes');
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
