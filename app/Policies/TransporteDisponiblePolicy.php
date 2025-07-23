<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TransporteDisponible;

class TransporteDisponiblePolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
    public function view(User $user, TransporteDisponible $transporte)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $transporte->chofer->usuario_id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['chofer']);
    }
    public function update(User $user, TransporteDisponible $transporte)
    {
        return $user->hasRole(['chofer']) && $user->id === $transporte->chofer->usuario_id;
    }
    public function delete(User $user, TransporteDisponible $transporte)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function restore(User $user, TransporteDisponible $transporte)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, TransporteDisponible $transporte)
    {
        return $user->hasRole(['admin']);
    }
    public function marcarDisponible(User $user, TransporteDisponible $transporte)
    {
        return $user->hasRole('chofer') && $user->id === $transporte->chofer->usuario_id;
    }
    public function verDisponibles(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer', 'pasajero']);
    }
}
