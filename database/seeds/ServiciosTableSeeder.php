<?php

use Illuminate\Database\Seeder;

class ServiciosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('servicios')->delete();
        
        \DB::table('servicios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Sala de musculación',
                'slug' => 'sala-de-musculacion',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/sala-de-musculacion.jpg',
                'created_at' => '2020-05-11 11:40:07',
                'updated_at' => '2020-05-11 11:40:07',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Máquinas de cardio',
                'slug' => 'maquinas-de-cardio',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/maquinas-de-cardio.jpg',
                'created_at' => '2020-05-11 11:42:27',
                'updated_at' => '2020-05-11 11:42:27',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Equipos modernos',
                'slug' => 'equipos-modernos',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/equipos-modernos.jpg',
                'created_at' => '2020-05-11 11:44:07',
                'updated_at' => '2020-05-11 11:44:07',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Sala de funcional',
                'slug' => 'sala-de-funcional',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/sala-de-funcional.jpg',
                'created_at' => '2020-05-11 11:49:31',
                'updated_at' => '2020-05-11 11:49:31',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Sala de clases grupales',
                'slug' => 'sala-de-clases-grupales',
                'descripcion' => '<ul>
<li>Baile moderno</li>
<li>Taebo</li>
<li>Full Body</li>
<li>Danza árabe</li>
<li>Danza peruana</li>
</ul>',
                'foto' => '/resources/img/servicios/sala-de-clases-grupales.jpg',
                'created_at' => '2020-05-11 11:51:45',
                'updated_at' => '2020-05-11 11:51:45',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Evaluaciones de control y seguimiento',
                'slug' => 'evaluaciones-de-control-y-seguimiento',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/evaluaciones-de-control-y-seguimiento.jpg',
                'created_at' => '2020-05-11 11:53:24',
                'updated_at' => '2020-05-11 11:53:24',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Transformación personal',
                'slug' => 'transformacion-personal',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/transformacion-personal.jpg',
                'created_at' => '2020-05-11 11:54:57',
                'updated_at' => '2020-05-11 11:54:57',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Maternidad Fitness: Entrenamiento para gestantes',
                'slug' => 'maternidad-fitness-entrenamiento-para-gestantes',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/maternidad-fitness-entrenamiento-para-gestantes.jpg',
                'created_at' => '2020-05-11 11:57:49',
                'updated_at' => '2020-05-11 12:00:33',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Clases de entrenamiento kids',
                'slug' => 'clases-de-entrenamiento-kids',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/clases-de-entrenamiento-kids.jpg',
                'created_at' => '2020-05-11 12:02:48',
                'updated_at' => '2020-05-11 12:02:48',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Cafetería deportiva',
                'slug' => 'cafeteria-deportiva',
                'descripcion' => '<p><br /></p>',
                'foto' => '/resources/img/servicios/cafeteria-deportiva.jpg',
                'created_at' => '2020-05-11 12:03:57',
                'updated_at' => '2020-05-11 12:03:57',
            ),
        ));
        
        
    }
}