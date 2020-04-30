<?php

use Illuminate\Database\Seeder;

class FondosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fondos')->delete();
        
        \DB::table('fondos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulo' => NULL,
                'numero' => 1,
                'foto' => '/resources/img/fondos/1.jpg',
                'created_at' => '2020-04-30 02:11:14',
                'updated_at' => '2020-04-30 02:11:14',
            ),
            1 => 
            array (
                'id' => 2,
                'titulo' => NULL,
                'numero' => 2,
                'foto' => '/resources/img/fondos/2.jpg',
                'created_at' => '2020-04-30 02:11:28',
                'updated_at' => '2020-04-30 02:11:28',
            ),
            2 => 
            array (
                'id' => 3,
                'titulo' => NULL,
                'numero' => 3,
                'foto' => '/resources/img/fondos/3.jpg',
                'created_at' => '2020-04-30 02:11:49',
                'updated_at' => '2020-04-30 02:11:49',
            ),
            3 => 
            array (
                'id' => 4,
                'titulo' => NULL,
                'numero' => 4,
                'foto' => '/resources/img/fondos/4.jpg',
                'created_at' => '2020-04-30 02:12:08',
                'updated_at' => '2020-04-30 02:12:08',
            ),
            4 => 
            array (
                'id' => 5,
                'titulo' => NULL,
                'numero' => 5,
                'foto' => '/resources/img/fondos/5.jpg',
                'created_at' => '2020-04-30 02:12:24',
                'updated_at' => '2020-04-30 02:12:24',
            ),
            5 => 
            array (
                'id' => 6,
                'titulo' => NULL,
                'numero' => 6,
                'foto' => '/resources/img/fondos/6.jpg',
                'created_at' => '2020-04-30 02:12:40',
                'updated_at' => '2020-04-30 02:12:40',
            ),
            6 => 
            array (
                'id' => 7,
                'titulo' => NULL,
                'numero' => 7,
                'foto' => '/resources/img/fondos/7.jpg',
                'created_at' => '2020-04-30 02:12:55',
                'updated_at' => '2020-04-30 02:12:55',
            ),
            7 => 
            array (
                'id' => 8,
                'titulo' => NULL,
                'numero' => 8,
                'foto' => '/resources/img/fondos/8.jpg',
                'created_at' => '2020-04-30 02:13:10',
                'updated_at' => '2020-04-30 02:13:10',
            ),
            8 => 
            array (
                'id' => 9,
                'titulo' => NULL,
                'numero' => 9,
                'foto' => '/resources/img/fondos/9.jpg',
                'created_at' => '2020-04-30 02:13:23',
                'updated_at' => '2020-04-30 02:13:23',
            ),
        ));
        
        
    }
}