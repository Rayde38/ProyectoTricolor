<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('avisopasajero', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasajero_id');
            $table->unsignedBigInteger('chofer_id')->nullable();
            $table->string('mensaje');
            $table->enum('tipo', ['info', 'alerta', 'turno', 'viaje'])->default('info');
            $table->enum('estado', ['pendiente', 'enviado', 'leido'])->default('pendiente');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('pasajero_id')->references('id')->on('pasajeros')->onDelete('cascade');
            $table->foreign('chofer_id')->references('id')->on('choferes')->onDelete('set null');
            $table->index(['tipo', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avisopasajero');
    }
};
