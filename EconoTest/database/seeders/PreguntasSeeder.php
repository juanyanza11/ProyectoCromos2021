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
            'enunciado' => 'Que determina el modelo clasico?',
            'tematica_id' => 1,
            'opcion_correcta' => 'uno',
            'opcion_1' => 'uno',
            'opcion_2' => 'dos',
            'opcion_3' => 'tres',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => 'Que es el ciclo economico?',
            'tematica_id' => 1,
            'opcion_correcta' => 'dos',
            'opcion_1' => 'uno',
            'opcion_2' => 'dos',
            'opcion_3' => 'tres',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('preguntas')->insert([
            'enunciado' => 'Que es la economia?',
            'tematica_id' => 3,
            'opcion_correcta' => 'tres',
            'opcion_1' => 'uno',
            'opcion_2' => 'dos',
            'opcion_3' => 'tres',
            'opcion_4' => 'cuatro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
