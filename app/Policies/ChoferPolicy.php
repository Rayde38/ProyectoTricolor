<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Chofer;

class ChoferPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function view(User $user, Chofer $chofer)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $chofer->usuario_id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function update(User $user, Chofer $chofer)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $chofer->usuario_id;
    }
    public function delete(User $user, Chofer $chofer)
    {
        return $user->hasRole(['admin']);
    }
    public function restore(User $user, Chofer $chofer)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, Chofer $chofer)
    {
        return $user->hasRole(['admin']);
    }
    public function marcarDisponibilidad(User $user, Chofer $chofer)
    {
        return $user->hasRole('chofer') && $user->id === $chofer->usuario_id;
    }
    public function verDisponibles(User $user)
    {
        return $user->hasRole(['admin', 'secretaria', 'chofer']);
    }
}
