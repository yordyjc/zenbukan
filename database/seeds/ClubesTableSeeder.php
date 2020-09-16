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
            )


        ));
    }
}
