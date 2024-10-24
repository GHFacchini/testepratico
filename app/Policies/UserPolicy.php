<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Enums\Role;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $authUser): bool
    {
        return $authUser->role === Role::Admin;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $authUser, User $user): bool
    {
        return $authUser->role === Role::Admin || $authUser->id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $authUser = null): bool
    {
        return is_null($authUser);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $authUser, User $user): bool
    {
        return $authUser->role === Role::Admin || $authUser->id === $user->id;
    }

    /**
     * Policy customizada para controlar a alteração de Roles.
     */
    public function updateRole(User $authUser): bool
    {
        return $authUser->role === Role::Admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $authUser, User $user): bool
    {
        return $authUser->role === Role::Admin || $authUser->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $authUser, User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $authUser, User $user): bool
    {
        //
    }
}
