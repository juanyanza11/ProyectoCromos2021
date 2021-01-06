<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

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
            ['codigo' => 'EC-MACRO', 'nombre' => 'MACROECONOMIA', 'imagen' => null,'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['codigo' => 'EC-MICRO', 'nombre' => 'MICROECONOMIA', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['codigo' => 'EC-METRIA', 'nombre' => 'ECONOMETRIA', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['codigo' => 'EC-TEMATICA4', 'nombre' => 'TEMATICA 4', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['codigo' => 'EC-TEMATICA5', 'nombre' => 'TEMATICA 5', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['codigo' => 'EC-TEMATICA6', 'nombre' => 'TEMATICA 6', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
        ]);
    }
}
