<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitulacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesor')->nullable();
            $table->foreign('id_profesor')->references('id')->on('profesores')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('id_actividad')->nullable();
            $table->foreign('id_actividad')->references('id')->on('actividades')->onUpdate('cascade')->onDelete('set null');
            $table->string('especialidad');
            $table->string('titulacion');
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
        Schema::dropIfExists('titulaciones');
    }
}
