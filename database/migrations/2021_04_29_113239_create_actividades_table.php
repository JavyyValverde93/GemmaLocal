<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->integer('estado')->default(1);//activo o no activo
            $table->string('salidas_profesionales')->nullable();

            $table->foreignId('id_categoria')->nullable();
            $table->foreign('id_categoria')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('id_profesor')->nullable();
            $table->foreign('id_profesor')->references('id')->on('profesores')->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('horas');
            $table->string('asistencia')->default('presencial');//presencial y no presencial
            $table->string('anio_academico');//2014/2015

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
        Schema::dropIfExists('actividades');
    }
}
