<?php

use Illuminate\Database\Seeder;

class PlanesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('planes')->delete();

        \DB::table('planes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nombre' => 'Plan Virtual',
                'slug' => 'plan-virtual',
                'descripcion' => '<ul class="list-unstyled">
<li>Acceso a la plataforma virtual</li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>',
                'moneda' => 'S/',
                'precio' => NULL,
                'color' => '#FE2B2C',
                'created_at' => '2020-05-04 01:47:48',
                'updated_at' => '2020-05-04 01:47:48',
            ),
            1 =>
            array (
                'id' => 2,
                'nombre' => 'Plan Fitness',
                'slug' => 'plan-fitness',
                'descripcion' => '<ul class="list-unstyled">
<li>Entrenamiento en el GYM</li>
<li>Acceso a todas las clases</li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>',
                'moneda' => 'S/',
                'precio' => NULL,
                'color' => '#009FD5',
                'created_at' => '2020-05-04 01:50:53',
                'updated_at' => '2020-05-04 01:50:53',
            ),
            2 =>
            array (
                'id' => 3,
                'nombre' => 'Plan Black',
                'slug' => 'plan-black',
                'descripcion' => '<ul class="list-unstyled">
<li>Entrenamiento en el GYM</li>
<li>Acceso a todas las clases</li>
<li>Evaluación física</li>
<li>Expediente de progreso personal</li>
</ul>',
                'moneda' => 'S/',
                'precio' => NULL,
                'color' => '#000000',
                'created_at' => '2020-05-04 01:51:18',
                'updated_at' => '2020-05-04 01:51:18',
            ),
            3 =>
            array (
                'id' => 4,
                'nombre' => 'Plan Premium',
                'slug' => 'plan-premium',
                'descripcion' => '<ul class="list-unstyled">
<li>Entrenamiento Personalizado</li>
<li>Seguimiento de Profesor Particular</li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>',
                'moneda' => 'S/',
                'precio' => NULL,
                'color' => '#FFC000',
                'created_at' => '2020-05-04 01:51:44',
                'updated_at' => '2020-05-04 01:51:44',
            ),
        ));


    }
}
