<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_actividad');
            $table->foreign('id_actividad')->references('id')->on('actividades')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('fecha_creacion');

            $table->foreignId('id_plazoprescripcion')->nullable();
            $table->foreign('id_plazoprescripcion')->references('id')->on('plazosprescripciones')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('prescripciones');
    }
}
