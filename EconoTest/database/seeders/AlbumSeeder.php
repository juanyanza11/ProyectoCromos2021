<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'nombre' => 'ALBUM DE ASTROLOGÍA',
            'descripcion' => 'descripcion album ASTROLOGÍA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'ALBUM DE DEPORTES',
            'descripcion' => 'descripcion album FÚTBOL',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'ALBUM DE MATEMÁTICAS',
            'descripcion' => 'descripcion album MATEMÁTICAS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('albums')->insert([
            'nombre' => 'ALBUM DE MEDICINA',
            'descripcion' => 'descripcion album MEDICINA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('albums')->insert([
            'nombre' => 'ALBUM DE MINERÍA',
            'descripcion' => 'descripcion album MINERÍA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('albums')->insert([
            'nombre' => 'ALBUM DE ECUADOR',
            'descripcion' => 'descripcion album PRESIDENTES',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
