<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->nullable();
            $table->foreign('id_usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('id_inventario')->nullable();
            $table->foreign('id_inventario')->references('id')->on('inventario')->onUpdate('cascade')->onDelete('set null');

            $table->bigInteger('fecha_prevista_devolucion');
            $table->decimal('importe_fianza');
            $table->text('concepto_fianza');
            $table->text('observaciones');
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
        Schema::dropIfExists('prestamos');
    }
}
