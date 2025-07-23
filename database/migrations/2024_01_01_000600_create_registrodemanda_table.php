<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrodemanda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasajero_id');
            $table->string('tramo');
            $table->timestamp('fecha_hora');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('pasajero_id')->references('id')->on('pasajeros')->onDelete('cascade');
            $table->index(['tramo', 'fecha_hora']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrodemanda');
    }
};
