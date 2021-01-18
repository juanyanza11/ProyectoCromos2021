<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TematicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tematicas')->insert([
            ['nombre' => 'ASTROLOGÍA', 'imagen' => 'astrologia.jfif','created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['nombre' => 'FÚTBOL', 'imagen' => 'futbolistas.jfif','created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['nombre' => 'MATEMÁTICAS', 'imagen' => 'matematicas.jfif','created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['nombre' => 'MEDICINA', 'imagen' => 'medicina.jpg','created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['nombre' => 'MINERÍA', 'imagen' => 'mineria.jfif','created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['nombre' => 'PRESIDENTES', 'imagen' => 'presidentes.png','created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
        ]);
    }
}
