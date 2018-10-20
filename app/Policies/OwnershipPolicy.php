<?php

namespace App\Policies;

use App\Interfaces\Ownable;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnershipPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Ownable $entity)
    {
        return $this->canManage($user, $entity);
    }

    public function edit(User $user, Ownable $entity)
    {
        return $this->canManage($user, $entity);
    }

    public function update(User $user, Ownable $entity)
    {
        return $this->canManage($user, $entity);
    }

    public function delete(User $user, Ownable $entity)
    {
        return $this->canManage($user, $entity);
    }

    protected function canManage(User $user, Ownable $entity)
    {
        return $user->id === $entity->getUserId();
    }
}