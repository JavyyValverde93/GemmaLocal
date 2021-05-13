<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaespaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaespacios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');

            $table->foreignId('id_grupo')->nullable();
            $table->foreign('id_grupo')->references('id')->on('grupos')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('id_usuario')->nullable();
            $table->foreign('id_usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('id_espacio')->nullable();
            $table->foreign('id_espacio')->references('id')->on('espacios')->onUpdate('cascade')->onDelete('set null');

            $table->bigInteger('fecha_inicio');
            $table->bigInteger('fecha_fin');
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
        Schema::dropIfExists('reservaespacios');
    }
}
