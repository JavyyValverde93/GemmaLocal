<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesor')->nullable();//Profesor
            $table->foreign('id_profesor')->references('id')->on('profesores')->onUpdate('cascade')->onDelete('set null');
            $table->string('nombre');
            $table->foreignId('id_espacio')->nullable();
            $table->foreign('id_espacio')->references('id')->on('espacios')->onUpdate('cascade')->onDelete('set null');

            // $table->foreignId('id_horario');
            // $table->foreign('id_horario')->references('id')->on('horarios')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('grupos');
    }
}
