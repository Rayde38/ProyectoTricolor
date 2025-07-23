<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pasajero;

class PasajeroPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
    public function view(User $user, Pasajero $pasajero)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $pasajero->usuario_id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function update(User $user, Pasajero $pasajero)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $pasajero->usuario_id;
    }
    public function delete(User $user, Pasajero $pasajero)
    {
        return $user->hasRole(['admin']);
    }
    public function restore(User $user, Pasajero $pasajero)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, Pasajero $pasajero)
    {
        return $user->hasRole(['admin']);
    }
    public function registrarEspera(User $user, Pasajero $pasajero)
    {
        return $user->hasRole('pasajero') && $user->id === $pasajero->usuario_id;
    }
    public function verEsperando(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
}
