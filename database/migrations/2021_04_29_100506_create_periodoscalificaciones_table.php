<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodoscalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodoscalificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
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
        Schema::dropIfExists('periodoscalificaciones');
    }
}
