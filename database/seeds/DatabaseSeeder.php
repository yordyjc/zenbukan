<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SectoresTableSeeder::class);
        $this->call(ClubesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ConfiguracionTableSeeder::class);
        $this->call(FondosTableSeeder::class);
        $this->call(PlanesTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);
        $this->call(TorneosTableSeeder::class);
        $this->call(ModalidadesTableSeeder::class);
    }
}
