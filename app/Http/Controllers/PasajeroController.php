<?php

namespace App\Http\Controllers;

use App\Models\Pasajero;
use Illuminate\Http\Request;
use App\Http\Requests\StorePasajeroRequest;
use App\Http\Requests\UpdatePasajeroRequest;

class PasajeroController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Pasajero::class);
        $pasajeros = Pasajero::with('usuario')->get();
        return response()->json($pasajeros);
    }

    public function show(Pasajero $pasajero)
    {
        $this->authorize('view', $pasajero);
        return response()->json($pasajero->load('usuario'));
    }

    public function store(StorePasajeroRequest $request)
    {
        $this->authorize('create', Pasajero::class);
        $pasajero = Pasajero::create($request->validated());
        return response()->json($pasajero, 201);
    }

    public function update(UpdatePasajeroRequest $request, Pasajero $pasajero)
    {
        $this->authorize('update', $pasajero);
        $pasajero->update($request->validated());
        return response()->json($pasajero);
    }

    public function destroy(Pasajero $pasajero)
    {
        $this->authorize('delete', $pasajero);
        $pasajero->delete();
        return response()->json(null, 204);
    }

    public function registrarEspera(Request $request, Pasajero $pasajero)
    {
        $this->authorize('registrarEspera', $pasajero);
        // Lógica para registrar espera
        // ...
        return response()->json(['message' => 'Esperando transporte']);
    }

    public function verEsperando()
    {
        $this->authorize('verEsperando', Pasajero::class);
        // Lógica para ver pasajeros esperando
        // ...
        return response()->json([]);
    }
}
