<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UsuarioSeeder::class);
        $this->call(TematicaSeeder::class);
        $this->call(PreguntasSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(CromoSeeder::class);
    }
}
