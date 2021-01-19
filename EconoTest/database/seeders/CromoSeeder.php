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

        // CROMOS ALBUM PRESIDENTES
        DB::table('cromos')->insert([
            'nombre' => 'Cromo Abdala',
            'descripcion' => 'descripcion cromo 1',
            'imagen' => 'abdala.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Arauz',
            'descripcion' => 'descripcion cromo 2',
            'imagen' => 'arauz.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Correa',
            'descripcion' => 'descripcion cromo 3',
            'imagen' => 'correa.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromos')->insert([
            'nombre' => 'Cromo Lasso',
            'descripcion' => 'descripcion cromo 4',
            'imagen' => 'lasso.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Lenin',
            'descripcion' => 'descripcion cromo 5',
            'imagen' => 'lenin.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('cromos')->insert([
            'nombre' => 'Cromo Lucio',
            'descripcion' => 'descripcion cromo 6',
            'imagen' => 'lucio.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Noboa',
            'descripcion' => 'descripcion cromo 7',
            'imagen' => 'noboa.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Nose',
            'descripcion' => 'descripcion cromo 8',
            'imagen' => 'nose.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Velazco',
            'descripcion' => 'descripcion cromo 9',
            'imagen' => 'velazco.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Yaku',
            'descripcion' => 'descripcion cromo 10',
            'imagen' => 'yaku.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        // CROMOS ALBUM FUTBOLISTAS
        DB::table('cromos')->insert([
            'nombre' => 'Cromo Benzema',
            'descripcion' => 'descripcion cromo 1',
            'imagen' => 'f-benzema.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Casse',
            'descripcion' => 'descripcion cromo 2',
            'imagen' => 'f-casse.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Dibala',
            'descripcion' => 'descripcion cromo 3',
            'imagen' => 'f-dibala.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromos')->insert([
            'nombre' => 'Cromo Cr7',
            'descripcion' => 'descripcion cromo 4',
            'imagen' => 'f-elbicho.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Kaka',
            'descripcion' => 'descripcion cromo 5',
            'imagen' => 'f-kaka.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('cromos')->insert([
            'nombre' => 'Cromo Marcelo',
            'descripcion' => 'descripcion cromo 6',
            'imagen' => 'f-marcelo.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Mbappe',
            'descripcion' => 'descripcion cromo 7',
            'imagen' => 'f-mbape.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Messi',
            'descripcion' => 'descripcion cromo 8',
            'imagen' => 'f-messi.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Modric',
            'descripcion' => 'descripcion cromo 9',
            'imagen' => 'f-modric.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromos')->insert([
            'nombre' => 'Cromo Neymar',
            'descripcion' => 'descripcion cromo 10',
            'imagen' => 'f-neymar.jfif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    
    }
}
