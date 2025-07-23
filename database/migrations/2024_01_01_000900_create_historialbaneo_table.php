<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historialbaneo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasajero_id');
            $table->unsignedBigInteger('usuario_id');
            $table->string('motivo');
            $table->timestamp('fecha_baneo');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('pasajero_id')->references('id')->on('pasajeros')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['fecha_baneo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historialbaneo');
    }
};
