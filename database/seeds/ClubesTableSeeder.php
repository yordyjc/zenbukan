<?php

use Illuminate\Database\Seeder;

class ClubesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clubes')->delete();
        \DB::table('clubes')->insert(array(
            0 => array(
                'id' => 1,
                'nombre' => 'Zenbukan',
                'pais_id' => '1'
            ),
            1 => array(
                'id' => 2,
                'nombre' => 'Kyo Han',
                'pais_id' => '1'
            ),
            2 => array(
                'id' => 3,
                'nombre' => 'Kamino',
                'pais_id' => '1'
            ),
            3 => array(
                'id' => 4,
                'nombre' => 'UNTAC',
                'pais_id' => '1'
            ),
            4 => array(
                'id' => 5,
                'nombre' => 'SEIBUKAN',
                'pais_id' => '1'
            ),
            5 => array(
                'id' => 6,
                'nombre' => 'SAKURA',
                'pais_id' => '1'
            ),
            6 => array(
                'id' => 7,
                'nombre' => 'NANTO',
                'pais_id' => '1'
            ),
            7 => array(
                'id' => 8,
                'nombre' => 'IPPON',
                'pais_id' => '1'
            ),
            8 => array(
                'id' => 9,
                'nombre' => 'SSS',
                'pais_id' => '1'
            ),
            8 => array(
                'id' => 10,
                'nombre' => 'KOBUKAN',
                'pais_id' => '1'
            )
        ));
    }
}
