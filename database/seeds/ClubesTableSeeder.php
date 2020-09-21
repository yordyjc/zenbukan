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
            ),
            1 => array(
                'id' => 2,
                'nombre' => 'Kyo Han'
            ),
            2 => array(
                'id' => 3,
                'nombre' => 'Kamino'
            ),
            3 => array(
                'id' => 4,
                'nombre' => 'UNTAC'
            ),
            4 => array(
                'id' => 5,
                'nombre' => 'SEIBUKAN'
            ),
            5 => array(
                'id' => 6,
                'nombre' => 'SAKURA'
            ),
            6 => array(
                'id' => 7,
                'nombre' => 'NANTO'
            ),
            7 => array(
                'id' => 8,
                'nombre' => 'IPPON'
            ),
            8 => array(
                'id' => 9,
                'nombre' => 'SSS'
            ),
            8 => array(
                'id' => 10,
                'nombre' => 'KOBUKAN'
            )
        ));
    }
}
