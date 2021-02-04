<?php

use Illuminate\Database\Seeder;

class TorneosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('torneos')->delete();
        \DB::table('torneos')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'nombre' => 'Copa Zenbukan 2021',
                    'descripcion' => '<p>Descipcion de este evento y mas información</p>',
                    'portada' => '/resources/img/torneos/portada-default.png',
                    'foto' => 'resources/img/torneos/foto-default.png',
                    'bases' => NULL,
                    'fecha' => '2020-09-20',
                    'hora' => '09:00:00',
                    'precio' => 50,
                    'lugar' =>'Tacna',
                    'estado' => 1,
                    'inscripciones' => 1,
                    'activo' => 0,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),

        ));

    }
}
