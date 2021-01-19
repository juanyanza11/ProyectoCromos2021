<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preguntas')->insert([
            'enunciado' => 'pregunta 1 de Futbol?',
            'tematica_id' => 2,
            'opcion_correcta' => 'correcta',
            'opcion_1' => 'correcta',
            'opcion_2' => 'dos',
            'opcion_3' => 'tres',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => 'pregunta 2 de Futbol?',
            'tematica_id' => 2,
            'opcion_correcta' => 'correcta',
            'opcion_1' => 'correcta',
            'opcion_2' => 'dos',
            'opcion_3' => 'tres',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => 'pregunta 3 de Futbol?',
            'tematica_id' => 2,
            'opcion_correcta' => 'correcta',
            'opcion_1' => 'correcta',
            'opcion_2' => 'dos',
            'opcion_3' => 'tres',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => 'Pregunta 2 de presidentes?',
            'tematica_id' => 6,
            'opcion_correcta' => 'correcta',
            'opcion_1' => 'uno',
            'opcion_2' => 'correcta',
            'opcion_3' => 'tres',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('preguntas')->insert([
            'enunciado' => 'PRegunta  1 de presidentes?',
            'tematica_id' => 6,
            'opcion_correcta' => 'correcta',
            'opcion_1' => 'uno',
            'opcion_2' => 'dos',
            'opcion_3' => 'correcta',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
         DB::table('preguntas')->insert([
            'enunciado' => 'PRegunta  3 de presidentes?',
            'tematica_id' => 6,
            'opcion_correcta' => 'correcta',
            'opcion_1' => 'uno',
            'opcion_2' => 'dos',
            'opcion_3' => 'correcta',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => 'PRegunta 1  MINERIA?',
            'tematica_id' => 5,
            'opcion_correcta' => 'correcta',
            'opcion_1' => 'uno',
            'opcion_2' => 'dos',
            'opcion_3' => 'correcta',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
