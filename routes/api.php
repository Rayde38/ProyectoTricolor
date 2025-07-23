<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API protegida con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Choferes
    // Route::apiResource('choferes', ChoferController::class);
    // Turnos
    // Route::apiResource('turnos', TurnoController::class);
    // Viajes
    // Route::apiResource('viajes', ViajeController::class);
    // Pasajeros
    // Route::apiResource('pasajeros', PasajeroController::class);
    // PasajeroEsperando
    // Route::apiResource('pasajeroesperando', PasajeroEsperandoController::class);
    // RegistroDemanda
    // Route::get('registrodemanda', [RegistroDemandaController::class, 'index']);
    // Usuarios
    // Route::apiResource('usuarios', UsuarioController::class);
    // TransporteDisponible
    // Route::apiResource('transportedisponible', TransporteDisponibleController::class);
    // AvisoPasajero
    // Route::apiResource('avisopasajero', AvisoPasajeroController::class);
    // HistorialBaneo
    // Route::apiResource('historialbaneo', HistorialBaneoController::class);

    // Endpoints especiales
    // Route::post('pasajeroesperando/registrar', ...);
    // Route::post('choferes/marcar-disponibilidad', ...);
    // Route::get('listas/pasajeros-esperando', ...);
    // Route::get('listas/choferes-disponibles', ...);
    // Route::post('notificaciones/broadcast', ...);
});
