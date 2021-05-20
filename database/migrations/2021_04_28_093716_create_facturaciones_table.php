<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturaciones', function (Blueprint $table) {
            $table->id();
            $table->string('forma_pago');
            $table->foreignId('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('num_tarjeta');
            $table->string('caducidad');
            $table->text('descripcion')->nullable();
            $table->string('tarifa_asignada')->nullable();
            $table->string('riesgo_maximo')->nullable();
            $table->integer('dia_pago');
            $table->integer('descuento');
            $table->decimal('precio_hora');
            $table->string('subcuenta_contable')->nullable();
            $table->string('titular_cuenta');
            $table->string('dni_titular');
            $table->string('nacionalidad_titular');
            $table->string('email_titular');
            $table->string('cuenta');
            $table->string('iban');
            $table->string('mandato_sepa');//firmado, no firmado
            $table->integer('swift');
            $table->bigInteger('fecha_mandato')->nullable();
            $table->string('nombre_banco');
            $table->string('direccion_banco');
            $table->string('poblacion_banco');
            $table->string('facturar_empresa');//si, no

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
        Schema::dropIfExists('facturaciones');
    }
}
