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
            'enunciado' => 'la macroeconomia estudia',
            'tematica_id' => 1,
            'opcion_correcta' => 'desempleo',
            'opcion_1' => 'produccion',
            'opcion_2' => 'desempleo',
            'opcion_3' => 'materia prima',
            'opcion_4' => 'empresa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => 'La economia estudia?',
            'tematica_id' => 1,
            'opcion_correcta' => 'ciencia',
            'opcion_1' => 'ciencia',
            'opcion_2' => 'musica',
            'opcion_3' => 'mecanica',
            'opcion_4' => 'deportes',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => '¿Seleccione los paises que apliquen el socialismo?',
            'tematica_id' => 1,
            'opcion_correcta' => 'China',
            'opcion_1' => 'Cuba',
            'opcion_2' => 'Brasil',
            'opcion_3' => 'Peru',
            'opcion_4' => 'China',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('preguntas')->insert([
            'enunciado' => 'La propiedad privada pretende',
            'tematica_id' => 1,
            'opcion_correcta' => 'liberalismo economico',
            'opcion_1' => 'privatizacion',
            'opcion_2' => 'evolucion de la moneda',
            'opcion_3' => 'liberalismo economico',
            'opcion_4' => 'todas las anteriores',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('preguntas')->insert([
            'enunciado' => 'La acuñacion de la moneda es mediante el respaldo de?',
            'tematica_id' => 1,
            'opcion_correcta' => 'oro',
            'opcion_1' => 'oro',
            'opcion_2' => 'materia prima',
            'opcion_3' => 'maquinaria',
            'opcion_4' => 'todas las anteriores',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('preguntas')->insert([
            'enunciado' => 'El continente europeo utiliza la moneda oficial',
            'tematica_id' => 1,
            'opcion_correcta' => 'euro',
            'opcion_1' => 'peso',
            'opcion_2' => 'euro',
            'opcion_3' => 'sol',
            'opcion_4' => 'dolar',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('preguntas')->insert([
            'enunciado' => 'la macroeconomia estudia',
            'tematica_id' => 1,
            'opcion_correcta' => 'desempleo',
            'opcion_1' => 'produccion',
            'opcion_2' => 'desempleo',
            'opcion_3' => 'materia prima',
            'opcion_4' => 'empresa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
