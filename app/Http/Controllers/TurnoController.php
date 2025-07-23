<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTurnoRequest;
use App\Http\Requests\UpdateTurnoRequest;

class TurnoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Turno::class);
        $query = Turno::with('chofer');
        if ($request->has('fecha')) {
            $query->where('fecha', $request->fecha);
        }
        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }
        $turnos = $query->get();
        return response()->json($turnos);
    }

    public function show(Turno $turno)
    {
        $this->authorize('view', $turno);
        return response()->json($turno->load('chofer'));
    }

    public function store(StoreTurnoRequest $request)
    {
        $this->authorize('create', Turno::class);
        $turno = Turno::create($request->validated());
        return response()->json($turno, 201);
    }

    public function update(UpdateTurnoRequest $request, Turno $turno)
    {
        $this->authorize('update', $turno);
        $turno->update($request->validated());
        return response()->json($turno);
    }

    public function destroy(Turno $turno)
    {
        $this->authorize('delete', $turno);
        $turno->delete();
        return response()->json(null, 204);
    }

    public function asignar(Request $request, Turno $turno)
    {
        $this->authorize('asignar', $turno);
        // Lógica para asignar turno
        // ...
        return response()->json(['message' => 'Turno asignado']);
    }

    public function verPorFechaEstado(Request $request)
    {
        $this->authorize('verPorFechaEstado', Turno::class);
        // Lógica para filtrar turnos por fecha y estado
        // ...
        return response()->json([]);
    }
}
