<?php

namespace App\Policies;

use App\Models\PolyticsCondition;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PolyticsConditionPolicy
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
    public function view(User $user, PolyticsCondition $polyticsCondition): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PolyticsCondition $polyticsCondition): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PolyticsCondition $polyticsCondition): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PolyticsCondition $polyticsCondition): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PolyticsCondition $polyticsCondition): bool
    {
        //
    }
}
