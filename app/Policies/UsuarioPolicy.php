<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Usuario;

class UsuarioPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin']);
    }
    public function view(User $user, Usuario $usuario)
    {
        return $user->hasRole(['admin']) || $user->id === $usuario->id;
    }
    public function create(User $user)
    {
        return $user->hasRole(['admin']);
    }
    public function update(User $user, Usuario $usuario)
    {
        return $user->hasRole(['admin']) || $user->id === $usuario->id;
    }
    public function delete(User $user, Usuario $usuario)
    {
        return $user->hasRole(['admin']);
    }
    public function restore(User $user, Usuario $usuario)
    {
        return $user->hasRole(['admin']);
    }
    public function forceDelete(User $user, Usuario $usuario)
    {
        return $user->hasRole(['admin']);
    }
    public function gestionarUsuarios(User $user)
    {
        return $user->hasRole(['admin']);
    }
}
