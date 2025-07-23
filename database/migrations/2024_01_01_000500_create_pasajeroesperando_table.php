<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasajeroesperando', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasajero_id');
            $table->string('tramo');
            $table->enum('estado', ['esperando', 'asignado', 'atendido', 'cancelado'])->default('esperando');
            $table->timestamp('hora_espera')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('pasajero_id')->references('id')->on('pasajeros')->onDelete('cascade');
            $table->index(['tramo', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasajeroesperando');
    }
};
