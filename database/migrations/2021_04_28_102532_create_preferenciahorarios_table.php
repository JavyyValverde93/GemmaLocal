<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferenciahorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferenciahorarios', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo');//0 alumno y 1 profesor
            $table->foreignId('id_usuario')->nullable();
            $table->foreign('id_usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('dia');
            $table->string('hora_inicio');
            $table->string('hora_fin');

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
        Schema::dropIfExists('preferenciahorarios');
    }
}
