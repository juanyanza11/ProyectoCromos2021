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
            'enunciado' => '¿Cuándo tuvo lugar la primera Copa Mundial de Fútbol??',
            'tematica_id' => 2,
            'opcion_correcta' => '1930 C',
            'opcion_1' => '1920',
            'opcion_2' => '1940',
            'opcion_3' => '1950',
            'opcion_4' => '1930 C',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => '¿Quién es el máximo goleador de la historia de la Copa Mundial de Fútbol??',
            'tematica_id' => 2,
            'opcion_correcta' => ' Miroslav Klose C',
            'opcion_1' => 'Ronaldo Nazario',
            'opcion_2' => 'Gerd Müller',
            'opcion_3' => 'Pelé',
            'opcion_4' => 'Miroslav Klose C',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => '¿Qué animal fue el escogido para ilustrar la mascota del Mundial de Rusia?',
            'tematica_id' => 2,
            'opcion_correcta' => 'Un lobo C',
            'opcion_1' => ' Un perro',
            'opcion_2' => 'Un gato',
            'opcion_3' => 'Un loro',
            'opcion_4' => 'Un lobo C',
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
