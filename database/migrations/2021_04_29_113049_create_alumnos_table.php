<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni')->nullable();
            $table->string('foto')->default('/imagenes/alumnos/default.png');
            $table->string('domicilio');
            $table->string('poblacion');
            $table->string('provincia');
            $table->string('pais');
            $table->integer('codigo_postal');
            $table->string('sexo');
            $table->string('telefono');
            $table->string('telefono2')->nullable();
            $table->string('email');
            $table->string('email2')->nullable();
            $table->integer('edad');
            $table->bigInteger('fecha_nacimiento');
            $table->string('lugar_nacimiento');
            $table->bigInteger('nss'); //Nº Seguridad Social
            $table->bigInteger('fecha_creacion');
            $table->bigInteger('fecha_dado_baja')->nullable();
            $table->text('observaciones')->nullable();


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
        Schema::dropIfExists('alumnos');
    }
}
