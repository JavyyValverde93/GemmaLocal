<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('fecha_creacion');
            $table->foreignId('id_prescripcion')->nullable();
            $table->foreign('id_prescripcion')->references('id')->on('prescripciones')->onUpdate('cascade')->onDelete('cascade');
            
            $table->foreignId('id_plazomatricula')->nullable();
            $table->foreign('id_plazomatricula')->references('id')->on('plazosmatriculas')->onUpdate('cascade')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
