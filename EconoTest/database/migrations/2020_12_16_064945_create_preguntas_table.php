<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idTematica');
            $table->string('enunciado');
            $table->string('respuesta');
            $table->string('alternativa1')-> nullable();
            $table->string('alternativa2')-> nullable();
            $table->string('alternativa3')-> nullable();
           
            $table->foreign('idTematica')->references('id')->on('tematicas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
