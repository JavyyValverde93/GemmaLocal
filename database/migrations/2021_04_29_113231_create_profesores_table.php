<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni');
            $table->string('foto')->default('imagenes/profesores/default.png');
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
            $table->string('lugar_nacimiento')->nullable();
            $table->bigInteger('nss'); //Nº Seguridad Social
            $table->bigInteger('fecha_creacion');
            $table->bigInteger('fecha_dado_baja')->nullable();
            $table->text('observaciones')->nullable();

            //Datos profesores
            $table->string('forma_pago')->nullable();
            $table->string('entidad_ingreso')->nullable();
            $table->string('cuenta_ingreso')->nullable();
            $table->integer('swift')->nullable();
            $table->bigInteger('iban')->nullable();
            $table->string('impuesto')->nullable();
            $table->integer('irpf')->nullable();

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
        Schema::dropIfExists('profesores');
    }
}
