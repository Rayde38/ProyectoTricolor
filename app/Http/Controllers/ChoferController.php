<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChoferRequest;
use App\Http\Requests\UpdateChoferRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ChoferController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $this->authorize('viewAny', Chofer::class);
        $choferes = Chofer::with('usuario')->get();
        return response()->json($choferes);
    }

    public function show(Chofer $chofer)
    {
        $this->authorize('view', $chofer);
        return response()->json($chofer->load('usuario'));
    }

    public function store(StoreChoferRequest $request)
    {
        $this->authorize('create', Chofer::class);
        $chofer = Chofer::create($request->validated());
        return response()->json($chofer, 201);
    }

    public function update(UpdateChoferRequest $request, Chofer $chofer)
    {
        $this->authorize('update', $chofer);
        $chofer->update($request->validated());
        return response()->json($chofer);
    }

    public function destroy(Chofer $chofer)
    {
        $this->authorize('delete', $chofer);
        $chofer->delete();
        return response()->json(null, 204);
    }

    public function marcarDisponibilidad(Request $request, Chofer $chofer)
    {
        $this->authorize('marcarDisponibilidad', $chofer);
        // Lógica para marcar disponibilidad (crear registro en transportedisponible)
        // ...
        return response()->json(['message' => 'Disponibilidad marcada']);
    }

    public function verDisponibles()
    {
        $this->authorize('verDisponibles', Chofer::class);
        // Lógica para ver choferes disponibles
        // ...
        return response()->json([]);
    }
}
