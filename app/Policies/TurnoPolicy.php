<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Turno;

class TurnoPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
    public function view(User $user, Turno $turno)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $turno->chofer->usuario_id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function update(User $user, Turno $turno)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $turno->chofer->usuario_id;
    }
    public function delete(User $user, Turno $turno)
    {
        return $user->hasRole(['admin']);
    }
    public function restore(User $user, Turno $turno)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, Turno $turno)
    {
        return $user->hasRole(['admin']);
    }
    public function asignar(User $user, Turno $turno)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function verPorFechaEstado(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
}
