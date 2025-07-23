<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chofer_id');
            $table->date('fecha');
            $table->enum('estado', ['pendiente', 'asignado', 'cumplido', 'incumplido', 'cancelado'])->default('pendiente');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('chofer_id')->references('id')->on('choferes')->onDelete('cascade');
            $table->index(['fecha', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
