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
            ['nombre' => 'MACROECONOMIA', 'imagen' => null,'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['nombre' => 'MICROECONOMIA', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['nombre' => 'ECONOMETRIA', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['nombre' => 'TEMATICA 4', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['nombre' => 'TEMATICA 5', 'imagen' => null,'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ['nombre' => 'TEMATICA 6', 'imagen' => null,'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
        ]);
    }
}
