<?php

namespace App\Policies;

use App\Models\Place;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlaceControllerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Place $place): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->role_id == 1
        ? Response::Allow()
        : Response::deny('Your don`t administarator');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Place $place)
    {
        return $user->role_id == 1
        ? Response::Allow()
        : Response::deny('Your don`t administarator');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Place $place)
    {
        return $user->role_id == 1
        ? Response::Allow()
        : Response::deny('Your don`t administarator');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Place $place)
    {
        return $user->role_id == 1
        ? Response::Allow()
        : Response::deny('Your don`t administarator');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Place $place): bool
    {
        //
    }
}
