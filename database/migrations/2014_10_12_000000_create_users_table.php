<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('email')->unique();
            $table->string('email2')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //Datos comunes
            $table->rememberToken();
            $table->foreignId('id_rol')->nullable();
            $table->foreign('id_rol')->references('id')->on('roles')->onUpdate('cascade')->onDelete('set null');
            $table->integer('estado')->default(1);//dado de alta 1 o -1 baja

            $table->bigInteger('fecha_creacion');
            $table->bigInteger('fecha_modificacion');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
