<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('rol', ['admin', 'secretaria', 'chofer', 'pasajero']);
            $table->enum('estado', ['activo', 'inactivo', 'baneado'])->default('activo');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['rol', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
