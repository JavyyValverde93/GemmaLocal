<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('total_mes');
            $table->string('nomina');
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
        Schema::dropIfExists('salarios');
    }
}
