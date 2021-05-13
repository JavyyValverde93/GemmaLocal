<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumno')->nullable();
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('set null');
            $table->string('nombre');
            $table->string('relacion');
            $table->string('dni');
            $table->string('telefono');
            $table->string('direccion');

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
        Schema::dropIfExists('tutores');
    }
}
