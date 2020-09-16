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
                    'nombre' => 'Copa Zenbukan 2020',
                    'descripcion' => '<p>Descipcion de este evento y mas información</p>',
                    'portada' => NULL,
                    'foto' => 'resoes/img/torneos/1599349220.jpg',
                    'bases' => NULL,
                    'fecha' => '2020-09-20',
                    'precio' => 50,
                    'lugar' =>'Tacna',
                    'estado' => 1,
                    'created_at' => '2020-09-19 00:49:58',
                    'updated_at' => '2020-09-19 00:49:58'
                ),

        ));

    }
}
