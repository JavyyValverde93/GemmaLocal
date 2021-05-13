<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolespermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolespermisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rol')->nullable();
            $table->foreign('id_rol')->references('id')->on('roles')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('id_permiso')->nullable();
            $table->foreign('id_permiso')->references('id')->on('permisos')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('rolespermisos');
    }
}
