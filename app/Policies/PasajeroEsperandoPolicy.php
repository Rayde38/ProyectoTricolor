<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PasajeroEsperando;

class PasajeroEsperandoPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
    public function view(User $user, PasajeroEsperando $espera)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']) || $user->id === $espera->pasajero->usuario_id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['pasajero']);
    }
    public function update(User $user, PasajeroEsperando $espera)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $espera->pasajero->usuario_id;
    }
    public function delete(User $user, PasajeroEsperando $espera)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $espera->pasajero->usuario_id;
    }
    public function restore(User $user, PasajeroEsperando $espera)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, PasajeroEsperando $espera)
    {
        return $user->hasRole(['admin']);
    }
    public function asignarChofer(User $user, PasajeroEsperando $espera)
    {
        return $user->hasRole(['chofer', 'secretaria']);
    }
    public function cancelarEspera(User $user, PasajeroEsperando $espera)
    {
        return $user->hasRole(['pasajero']) && $user->id === $espera->pasajero->usuario_id;
    }
}
