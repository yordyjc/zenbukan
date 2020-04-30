<?php

use Illuminate\Database\Seeder;

class ConfiguracionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configuracion')->delete();
        
        \DB::table('configuracion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulo' => 'Fitness 10',
                'descripcion' => 'El ejercicio es sinónimo de salud',
                'email' => NULL,
                'telefono' => NULL,
                'direccion' => NULL,
                'favicon' => '/resources/img/favicon.ico',
                'logo' => '/resources/img/logo.png',
                'mision' => NULL,
                'vision' => NULL,
                'facebook' => NULL,
                'twitter' => NULL,
                'instagram' => NULL,
                'youtube' => NULL,
                'whatsapp' => NULL,
                'linkedin' => NULL,
                'ganalytics' => NULL,
                'gwmt' => NULL,
                'gmaps' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}