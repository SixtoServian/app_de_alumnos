<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * El admin siempre pasa; el resto cae a los métodos concretos.
     */
    public function before(User $user, string $ability): ?bool
    {
        return $user->is_admin ? true : null;
    }

    /**
     * Solo el admin puede ver el listado completo
     * (el resto de casos ya lo cubre before()).
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Un alumno solo puede ver su propio perfil.
     */
    public function view(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }

    /**
     * Un alumno solo puede actualizar su propio perfil.
     */
    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }
}