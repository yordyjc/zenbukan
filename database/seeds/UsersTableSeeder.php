<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use App\User;
use App\Models\Sector;
use App\Models\Ficha;
use App\Models\Periodo;

class UsersTableSeeder extends Seeder
{
    public function ultimo_periodo($correlativo)
    {
        $ultimo=Periodo::where('ficha_id',$correlativo)->orderBy('numero','desc')->first();
        if ($ultimo) {
            $numero=$ultimo->numero+1;
        }
        else{
            $numero=1;
        }
        return $numero;
    }

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
                'direccion' => NULL,
                'nacimiento' => '1990-01-01',
                'edad' => NULL,
                'tipo' => 1,
                'foto' => '/resources/img/user/default.png',
                'observaciones' => NULL,
                'doc' =>'11111112',
                'confirmado' => 1,
                'confirmacion_code' => NULL,
                'activo' => 1,
                'club_id' => 1,
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
                'direccion' => NULL,
                'nacimiento' => '1990-01-01',
                'edad' => NULL,
                'tipo' => 1,
                'foto' => '/resources/img/user/default.png',
                'observaciones' => NULL,
                'doc' =>'11111111',
                'confirmado' => 1,
                'confirmacion_code' => NULL,
                'activo' => 1,
                'club_id' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-09-19 00:52:23',
                'updated_at' => '2019-09-19 00:52:23',
            ),
        ));

        $faker = Faker::create('es_PE');
        $orden = 3;
        $correlativo = 1;
        foreach (range(1,100) as $index) {
            $creado = $faker->dateTimeBetween('-1 years','now');
            $talla = $faker->randomFloat(2,1.40,2.10);
            \DB::table('users')->insert([
                'id' => $orden,
                'nombres' => $faker->firstname,
                'apellidos' => $faker->lastname.' '.$faker->lastname,
                'email' => $faker->unique()->email,
                'password' => '$2y$10$A/KvMFYK0Reu/pid3LHQGuRWWSXP6fLlLCxiDl9yoe1xujW1M5JbW',
                'telefono' => $faker->phoneNumber,
                'sexo' => $faker->randomElement(['0', '1']),
                'direccion' => $faker->address,
                'nacimiento' => $faker->optional(0.8)->dateTimeBetween('-35 years','-18 years'),
                'edad' => $faker->optional(0.2)->numberBetween(18,35),
                'foto' => '/resources/img/user/default.png',
                'observaciones' => NULL,
                'doc' => $faker->unique()->numberBetween(11111113,99999999),
                'confirmado' => 1,
                'club_id' => rand(1,10),

                'confirmacion_code' => NULL,
                'activo' => 1,
                'remember_token' => NULL,
                'created_at' => $creado,
                'updated_at' => $creado,
            ]);
            \DB::table('inscripciones')->insert([
                'anfitrion_id'=> 1,
                'modalidad_id' => rand(30,33),
                'competidor_id' => $orden,
                'cabeza_serie' => 0,
                'kata' => 1,
                'kumite' => 1,
                'edad' => rand(16,18),
                'grado' => NULL,
                'club_id' => rand(1,10)
            ]);

            $orden=$orden+1;
            $correlativo=$correlativo+1;
        }

    }
}
