<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTematicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tematicas', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('nombreTematica')->default(' ');
        });

        DB::table('tematicas')->insert([
            ['id' => 'EC-MACRO', 'nombreTematica' => 'MACROECONOMIA'],
            ['id' => 'EC-MICRO', 'nombreTematica' => 'MICROECONOMIA'],
            ['id' => 'EC-METRIA', 'nombreTematica' => 'ECONOMETRIA'],
            ['id' => 'EC-TEMATICA4', 'nombreTematica' => 'TEMATICA 4'],
            ['id' => 'EC-TEMATICA5', 'nombreTematica' => 'TEMATICA 5'],
            ['id' => 'EC-TEMATICA6', 'nombreTematica' => 'TEMATICA 6'],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tematicas');
    }
}
