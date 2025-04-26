<?php

namespace App\Policies;

use App\Models\User;
use App\UserType;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->type === UserType::SuperAdmin;
    }

    public function create(User $user)
    {
        return $user->type === UserType::SuperAdmin;
    }

    public function update(User $user, User $model)
    {
        // Seul un superadmin peut modifier un autre superadmin
        if ($model->type === UserType::SuperAdmin) {
            return $user->id === $model->id;
        }

        return $user->type === UserType::SuperAdmin ||
            ($user->type ===  UserType::Admin && $model->type !==  UserType::Admin);
    }

    public function delete(User $user, User $model)
    {
        // Personne ne peut se supprimer soi-même
        if ($user->id === $model->id) {
            return false;
        }

        // Seul un superadmin peut supprimer un admin
        if ($model->type === UserType::SuperAdmin) {
            return false;
        }

        return $user->type === UserType::SuperAdmin ||
            ($user->type ===  UserType::Admin && $model->type !==  UserType::Admin);
    }
}
