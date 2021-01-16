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

        Schema::create('tematicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });

        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('enunciado');
            $table->string("opcion_correcta");
            $table->string('opcion_1');
            $table->string('opcion_2');
            $table->string('opcion_3');
            $table->string('opcion_4');
            $table->foreignId('tematica_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('tematica');
    }
}
