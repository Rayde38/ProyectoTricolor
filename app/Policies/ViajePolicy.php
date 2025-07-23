<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Viaje;

class ViajePolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
    public function view(User $user, Viaje $viaje)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $viaje->chofer->usuario_id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function update(User $user, Viaje $viaje)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $viaje->chofer->usuario_id;
    }
    public function delete(User $user, Viaje $viaje)
    {
        return $user->hasRole(['admin']);
    }
    public function restore(User $user, Viaje $viaje)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, Viaje $viaje)
    {
        return $user->hasRole(['admin']);
    }
    public function notificarPasajeros(User $user, Viaje $viaje)
    {
        return $user->hasRole(['chofer', 'secretaria']) && $user->id === $viaje->chofer->usuario_id;
    }
    public function verPorEstado(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
}
