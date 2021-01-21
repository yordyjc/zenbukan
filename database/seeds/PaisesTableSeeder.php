<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('paises')->delete();

        \DB::table('paises')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nombre' => 'Perú',
                'bandera' => '/resources/img/paises/peru.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'nombre' => 'Chile',
                'bandera' => '/resources/img/paises/chile.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'nombre' => 'Argentina',
                'bandera' => '/resources/img/paises/argentina.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'nombre' => 'Paraguay',
                'bandera' => '/resources/img/paises/paraguay.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'nombre' => 'Uruguay',
                'bandera' => '/resources/img/paises/uruguay.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'nombre' => 'Brasil',
                'bandera' => '/resources/img/paises/brasil.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'nombre' => 'Colombia',
                'bandera' => '/resources/img/paises/colombia.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'nombre' => 'Ecuador',
                'bandera' => '/resources/img/paises/ecuador.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'nombre' => 'EEUU',
                'bandera' => '/resources/img/paises/eeuu.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
