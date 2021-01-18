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
            'tematica_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'ALBUM DE FÚTBOL',
            'descripcion' => 'descripcion album FÚTBOL',
            'tematica_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'ALBUM DE MATEMÁTICAS',
            'descripcion' => 'descripcion album MATEMÁTICAS',
            'tematica_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('albums')->insert([
            'nombre' => 'ALBUM DE MEDICINA',
            'descripcion' => 'descripcion album MEDICINA',
            'tematica_id' => '4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('albums')->insert([
            'nombre' => 'ALBUM DE MINERÍA',
            'descripcion' => 'descripcion album MINERÍA',
            'tematica_id' => '5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('albums')->insert([
            'nombre' => 'ALBUM DE PRESIDENTES',
            'descripcion' => 'descripcion album PRESIDENTES',
            'tematica_id' => '6',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
