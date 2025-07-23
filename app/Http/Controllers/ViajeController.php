<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;
use App\Http\Requests\StoreViajeRequest;
use App\Http\Requests\UpdateViajeRequest;

class ViajeController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Viaje::class);
        $query = Viaje::with(['chofer', 'turno']);
        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }
        $viajes = $query->get();
        return response()->json($viajes);
    }

    public function show(Viaje $viaje)
    {
        $this->authorize('view', $viaje);
        return response()->json($viaje->load(['chofer', 'turno']));
    }

    public function store(StoreViajeRequest $request)
    {
        $this->authorize('create', Viaje::class);
        $viaje = Viaje::create($request->validated());
        return response()->json($viaje, 201);
    }

    public function update(UpdateViajeRequest $request, Viaje $viaje)
    {
        $this->authorize('update', $viaje);
        $viaje->update($request->validated());
        return response()->json($viaje);
    }

    public function destroy(Viaje $viaje)
    {
        $this->authorize('delete', $viaje);
        $viaje->delete();
        return response()->json(null, 204);
    }

    public function notificarPasajeros(Request $request, Viaje $viaje)
    {
        $this->authorize('notificarPasajeros', $viaje);
        // Lógica para notificar pasajeros
        // ...
        return response()->json(['message' => 'Pasajeros notificados']);
    }

    public function verPorEstado(Request $request)
    {
        $this->authorize('verPorEstado', Viaje::class);
        // Lógica para filtrar viajes por estado
        // ...
        return response()->json([]);
    }
}
