<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndiceFaulknerToPeriodos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periodos', function (Blueprint $table) {
            $table->float('triceps')->nullable()->after('obs_fisico');
            $table->float('subescapular')->nullable()->after('triceps');
            $table->float('suprailiaco')->nullable()->after('subescapular');
            $table->float('abdominal')->nullable()->after('suprailiaco');
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
