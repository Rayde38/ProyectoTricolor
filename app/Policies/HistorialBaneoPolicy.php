<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HistorialBaneo;

class HistorialBaneoPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function view(User $user, HistorialBaneo $baneo)
    {
        return $user->hasRole(['admin', 'secretaria']) || $user->id === $baneo->usuario_id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function update(User $user, HistorialBaneo $baneo)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function delete(User $user, HistorialBaneo $baneo)
    {
        return $user->hasRole(['admin']);
    }
    public function restore(User $user, HistorialBaneo $baneo)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, HistorialBaneo $baneo)
    {
        return $user->hasRole(['admin']);
    }
    public function gestionarBaneos(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
    public function verHistorial(User $user)
    {
        return $user->hasRole(['admin', 'secretaria']);
    }
}
