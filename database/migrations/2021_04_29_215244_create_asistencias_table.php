<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno')->nullable();
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('id_grupo')->nullable();
            $table->foreign('id_grupo')->references('id')->on('grupos')->onUpdate('cascade')->onDelete('set null');
            $table->boolean('justificada')->default(false);
            $table->boolean('ausente')->default(false);

            $table->bigInteger('fecha_creacion');
            $table->bigInteger('fecha_modificacion');
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
        Schema::dropIfExists('asistencias');
    }
}
