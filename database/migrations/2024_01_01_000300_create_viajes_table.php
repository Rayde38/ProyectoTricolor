<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chofer_id');
            $table->unsignedBigInteger('turno_id');
            $table->string('tramo');
            $table->enum('estado', ['pendiente', 'en_curso', 'finalizado', 'cancelado'])->default('pendiente');
            $table->timestamp('inicio')->nullable();
            $table->timestamp('fin')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('chofer_id')->references('id')->on('choferes')->onDelete('cascade');
            $table->foreign('turno_id')->references('id')->on('turnos')->onDelete('cascade');
            $table->index(['tramo', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
