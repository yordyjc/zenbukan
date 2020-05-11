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
                'email' => 'contacto@fitness10salud.com',
                'telefono' => '952 686 236 - 995 716 391',
            'direccion' => 'Av. Vigil 1070 (puerta de salida de Tupac Amaru)',
                'favicon' => '/resources/img/favicon.ico',
                'logo' => '/resources/img/logo.png',
                'mision' => 'Ayudar a nuestros socios a alcanzar sus metas de salud integral, ofreciendo un servicio de calidad y una experiencia completa de entrenamiento.',
                'vision' => 'Ser reconocidos como la cadena de gimnasios que busca generar el máximo bienestar a nuestros socios, mediante la innovación y las últimas tendencias de la industria, a través del compromiso y dedicación de nuestro equipo de profesionales.',
                'facebook' => 'https://www.facebook.com/Fitness-10-gimnasio-305262453403751',
                'twitter' => NULL,
                'instagram' => NULL,
                'youtube' => NULL,
                'whatsapp' => NULL,
                'linkedin' => NULL,
                'ganalytics' => NULL,
                'gwmt' => NULL,
                'gmaps' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-05-10 22:20:48',
            ),
        ));
        
        
    }
}