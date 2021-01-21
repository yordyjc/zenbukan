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
        $this->call(TorneosTableSeeder::class);
        $this->call(ModalidadesTableSeeder::class);
        $this->call(PaisesTableSeeder::class);
        $this->call(ClubesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ConfiguracionTableSeeder::class);
        $this->call(FondosTableSeeder::class);

    }
}
