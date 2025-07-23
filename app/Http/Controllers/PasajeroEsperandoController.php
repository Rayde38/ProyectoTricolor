<?php

namespace App\Http\Controllers;

use App\Models\PasajeroEsperando;
use Illuminate\Http\Request;
use App\Http\Requests\StorePasajeroEsperandoRequest;
use App\Http\Requests\UpdatePasajeroEsperandoRequest;

class PasajeroEsperandoController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', PasajeroEsperando::class);
        $esperas = PasajeroEsperando::with('pasajero')->get();
        return response()->json($esperas);
    }

    public function show(PasajeroEsperando $pasajeroesperando)
    {
        $this->authorize('view', $pasajeroesperando);
        return response()->json($pasajeroesperando->load('pasajero'));
    }

    public function store(StorePasajeroEsperandoRequest $request)
    {
        $this->authorize('create', PasajeroEsperando::class);
        $espera = PasajeroEsperando::create($request->validated());
        return response()->json($espera, 201);
    }

    public function update(UpdatePasajeroEsperandoRequest $request, PasajeroEsperando $pasajeroesperando)
    {
        $this->authorize('update', $pasajeroesperando);
        $pasajeroesperando->update($request->validated());
        return response()->json($pasajeroesperando);
    }

    public function destroy(PasajeroEsperando $pasajeroesperando)
    {
        $this->authorize('delete', $pasajeroesperando);
        $pasajeroesperando->delete();
        return response()->json(null, 204);
    }

    public function asignarChofer(Request $request, PasajeroEsperando $pasajeroesperando)
    {
        $this->authorize('asignarChofer', $pasajeroesperando);
        // Lógica para asignar chofer
        // ...
        return response()->json(['message' => 'Chofer asignado']);
    }

    public function cancelarEspera(Request $request, PasajeroEsperando $pasajeroesperando)
    {
        $this->authorize('cancelarEspera', $pasajeroesperando);
        // Lógica para cancelar espera
        // ...
        return response()->json(['message' => 'Espera cancelada']);
    }
}
