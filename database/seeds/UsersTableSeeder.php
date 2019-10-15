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

        // $faker = Faker::create('es_PE');
        // $orden = 3;
        // $correlativo = 1;
        // foreach (range(1,100) as $index) {
        //     $creado = $faker->dateTimeBetween('-1 years','now');
        //     $talla = $faker->randomFloat(2,1.40,2.10);
        //     \DB::table('users')->insert([
        //         'id' => $orden,
        //         'nombres' => $faker->firstname,
        //         'apellidos' => $faker->lastname.' '.$faker->lastname,
        //         'email' => $faker->unique()->email,
        //         'password' => '$2y$10$6edco69XWqwfvM7a19fTpe5R.ocKTb.CT8J8BG/RGy/Qns6azHoPa',
        //         'telefono' => $faker->phoneNumber,
        //         'sexo' => $faker->randomElement(['0', '1']),
        //         'sector_id' => Sector::inRandomOrder()->value('id') ?: factory(Sector::class),
        //         'direccion' => $faker->address,
        //         'interes' => $faker->randomElement(['1', '2', '3', '4', '5']),
        //         'nacimiento' => $faker->optional(0.8)->dateTimeBetween('-35 years','-18 years'),
        //         'edad' => $faker->optional(0.2)->numberBetween(18,35),
        //         'enfermedad' => NULL,
        //         'tipo' => 2,
        //         'foto' => '/resources/img/user/default.png',
        //         'observaciones' => NULL,
        //         'confirmado' => 1,
        //         'confirmacion_code' => NULL,
        //         'activo' => 1,
        //         'remember_token' => NULL,
        //         'created_at' => $creado,
        //         'updated_at' => $creado,
        //     ]);

        //     \DB::table('fichas')->insert([
        //         'user_id' => $orden,
        //         'correlativo' => $correlativo,
        //         'talla' => $talla,
        //         'fecha' => $creado,
        //         'activo' => 1,
        //         'created_at' => $creado,
        //         'updated_at' => $creado,
        //     ]);

        //     $orden=$orden+1;
        //     $correlativo=$correlativo+1;
        // }

        // foreach (range(1,500) as $index2) {

        //     $ficha = $faker->numberBetween(1,100);
        //     $latalla = Ficha::where('id',$ficha)->first();

        //     \DB::table('periodos')->insert([
        //         'numero' => $this->ultimo_periodo($ficha),
        //         'ficha_id' => $ficha,
        //         'fecha' => $faker->dateTimeBetween('-1 years','now'),
        //         'talla' => $latalla->talla,
        //         'peso' => $faker->randomFloat(2,50.00,110.00),
        //         'presion' => $faker->numberBetween(80,130).'/'.$faker->numberBetween(60,100),
        //         'grasa' => $faker->randomFloat(2,0,100),
        //         'ritmo' => $faker->numberBetween(40,120),
        //         'check_monitoreo' => 1,
        //         'pecho' => $faker->randomFloat(2,40,100),
        //         'espalda' => $faker->randomFloat(2,40,100),
        //         'hombros' => $faker->randomFloat(2,40,100),
        //         'biceps' => $faker->randomFloat(2,40,100),
        //         'cintura' => $faker->randomFloat(2,40,100),
        //         'gluteos' => $faker->randomFloat(2,40,80),
        //         'pierna' => $faker->randomFloat(2,40,100),
        //         'pantorrilla' => $faker->randomFloat(2,20,40),
        //         'check_fisico' => 1,
        //         'planchas' => $faker->numberBetween(5,50),
        //         'sentadillas' => $faker->numberBetween(5,50),
        //         'abdominales' => $faker->numberBetween(5,50),
        //         'created_at' => $faker->dateTimeBetween('-1 years','now'),
        //         'updated_at' => $faker->dateTimeBetween('-1 years','now'),
        //     ]);

        // }

    }
}
