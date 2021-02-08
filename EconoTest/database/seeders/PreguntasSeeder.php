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

        DB::table('preguntas')->insert([
            'enunciado' => 'En una economía en Pleno Empleo:',
            'tematica_id' => 7,
            'opcion_correcta' => 'Aún así existe el desempleo #',
            'opcion_1' => 'El PIB real está por debajo del PIB Potencial',
            'opcion_2' => 'La cantidad demanda de trabajo, es superior a la cantidad ofertada de trabajo',
            'opcion_3' => 'Aún así existe el desempleo #',
            'opcion_4' => 'La tasa de desempleo es del 0%',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('preguntas')->insert([
            'enunciado' => '¿Qué es la Frontera de Posibilidades de Producción?',
            'tematica_id' => 7,
            'opcion_correcta' => 'Límite entre aquellas combinaciones de bienes y servicios que se pueden producir y las que no #',
            'opcion_1' => 'Limite entre aquellas combinaciones de bienes y servicios que no se puedan producir',
            'opcion_2' => 'Es el punto máximo al que puede llegar para desplazar la demanda agregada a la derecha',
            'opcion_3' => 'Es el punto máximo al que puede llegar para desplazar la demanda agregada a la izquierda',
            'opcion_4' => 'Límite entre aquellas combinaciones de bienes y servicios que se pueden producir y las que no #',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('preguntas')->insert([
            'enunciado' => '¿Cúal de las siguientes NO es una función del dinero?',
            'tematica_id' => 7,
            'opcion_correcta' => 'Fomentar el trueque #',
            'opcion_1' => 'Fomentar el trueque #',
            'opcion_2' => 'Liquidar deudas',
            'opcion_3' => 'Presupuestar el ahorro',
            'opcion_4' => 'Fomentar el ahorro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
    }
}
