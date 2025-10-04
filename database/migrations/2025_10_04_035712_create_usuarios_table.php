<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre')->nullable();
            $table->string('correo')->nullable()->unique();
            $table->string('contraseña')->nullable();
            $table->string('telefono')->nullable();
            $table->string('Tipo_Doc')->nullable();
            $table->string('documento')->nullable();
            $table->unsignedBigInteger('id_rol')->nullable();
            
            // Comenta esta línea si la tabla roles no existe aún
            // $table->foreign('id_rol')->references('id_rol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};