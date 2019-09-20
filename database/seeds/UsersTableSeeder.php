<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nombres' => 'Super',
                'apellidos' => 'Administrador',
                'email' => 'super@super.com',
                'password' => '$2y$10$/Iq4y5XP7WS4VUiLAlYMw.89ZCknnB8fkKwFTziYTHm7jdzrWj09O',
                'telefono' => '921892150',
                'sexo' => 1,
                'sector_id' => 1,
                'direccion' => NULL,
                'interes' => 5,
                'nacimiento' => '1990-01-01',
                'edad' => NULL,
                'enfermedad' => NULL,
                'tipo' => 1,
                'foto' => '/resources/img/user/default.png',
                'observaciones' => NULL,
                'confirmado' => 1,
                'confirmacion_code' => NULL,
                'activo' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-09-19 00:49:58',
                'updated_at' => '2019-09-19 00:49:58',
            ),
            1 =>
            array (
                'id' => 2,
                'nombres' => 'Administrador',
                'apellidos' => 'del Sistema',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$6edco69XWqwfvM7a19fTpe5R.ocKTb.CT8J8BG/RGy/Qns6azHoPa',
                'telefono' => '921892150',
                'sexo' => 1,
                'sector_id' => 1,
                'direccion' => NULL,
                'interes' => 5,
                'nacimiento' => '1990-01-01',
                'edad' => NULL,
                'enfermedad' => NULL,
                'tipo' => 1,
                'foto' => '/resources/img/user/default.png',
                'observaciones' => NULL,
                'confirmado' => 1,
                'confirmacion_code' => NULL,
                'activo' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-09-19 00:52:23',
                'updated_at' => '2019-09-19 00:52:23',
            ),
        ));


    }
}
