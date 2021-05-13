<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno')->nullable();
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('id_actividad')->nullable();
            $table->foreign('id_actividad')->references('id')->on('actividades')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('id_grupo')->nullable();
            $table->foreign('id_grupo')->references('id')->on('grupos')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('id_periodocalificacion')->nullable();
            $table->foreign('id_periodocalificacion')->references('id')->on('periodoscalificaciones')->onUpdate('cascade')->onDelete('set null');
            $table->decimal('nota');
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
        Schema::dropIfExists('calificaciones');
    }
}
