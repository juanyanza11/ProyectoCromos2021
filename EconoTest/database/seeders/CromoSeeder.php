<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class CromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cromos')->insert([
            'nombre' => 'Cromo 1',
            'descripcion' => 'descripcion cromo 1',
            'album_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo 2',
            'descripcion' => 'descripcion cromo 2',
            'album_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo 3',
            'descripcion' => 'descripcion cromo 3',
            'album_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromos')->insert([
            'nombre' => 'Cromo 4',
            'descripcion' => 'descripcion cromo 4',
            'album_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
