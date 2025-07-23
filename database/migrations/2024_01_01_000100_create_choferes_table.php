<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono')->unique();
            $table->string('ci')->unique();
            $table->enum('estado', ['activo', 'inactivo', 'baneado'])->default('activo');
            $table->unsignedBigInteger('usuario_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('choferes');
    }
};
