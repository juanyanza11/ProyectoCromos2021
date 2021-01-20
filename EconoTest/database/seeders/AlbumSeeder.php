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
            'nombre' => 'ASTROLOGÍA',
            'descripcion' => 'descripcion album ASTROLOGÍA',
            'imagen' =>'Astrologia.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'DEPORTES',
            'descripcion' => 'descripcion album FÚTBOL',
            'imagen' =>'deporte.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'MATEMÁTICAS',
            'descripcion' => 'descripcion album MATEMÁTICAS',
            'imagen' =>'matematicas.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'MEDICINA',
            'descripcion' => 'descripcion album MEDICINA',
            'imagen' =>'medicina.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'ECONOMÍA',
            'descripcion' => 'descripcion album MINERÍA',
            'imagen' =>'economia.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('albums')->insert([
            'nombre' => 'ECUADOR',
            'descripcion' => 'descripcion album PRESIDENTES',
            'imagen' =>'ecuador.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
