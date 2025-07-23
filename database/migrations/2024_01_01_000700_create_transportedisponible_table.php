<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transportedisponible', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chofer_id');
            $table->string('parada');
            $table->enum('estado', ['esperando', 'en_ruta', 'ocupado', 'no_disponible'])->default('esperando');
            $table->timestamp('hora_disponible')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('chofer_id')->references('id')->on('choferes')->onDelete('cascade');
            $table->index(['parada', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transportedisponible');
    }
};
