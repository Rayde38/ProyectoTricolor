<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AvisoPasajero;

class AvisoPasajeroPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer', 'pasajero']);
    }
    public function view(User $user, AvisoPasajero $aviso)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $aviso->pasajero->usuario_id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['chofer', 'secretaria']);
    }
    public function update(User $user, AvisoPasajero $aviso)
    {
        return $user->hasRole(['chofer', 'secretaria']) && $user->id === $aviso->pasajero->usuario_id;
    }
    public function delete(User $user, AvisoPasajero $aviso)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function restore(User $user, AvisoPasajero $aviso)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, AvisoPasajero $aviso)
    {
        return $user->hasRole(['admin']);
    }
    public function notificar(User $user, AvisoPasajero $aviso)
    {
        return $user->hasRole(['chofer', 'secretaria']);
    }
    public function verAvisos(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer', 'pasajero']);
    }
}
