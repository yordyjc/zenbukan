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
                'titulo' => 'Zenbukan',
                'descripcion' => 'Artes marciales & Fitness',
                'email' => 'contacto@zenbukanperu.com',
                'telefono' => '999 999999',
            'direccion' => 'Av. 2 de mayo 889 (La Cascada Plaza - 4to piso)',
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