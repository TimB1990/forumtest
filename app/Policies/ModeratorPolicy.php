<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Moderator;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModeratorPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability){
        return $user->active && $user->role == 'admin' ? Response::allow() : Response::deny('Only the admin is allowed to maintain moderation');
    }


    public function create(User $user)
    {
        return true;
    }


    public function update(User $user, Moderator $moderator)
    {
        return true;
    }


    public function delete(User $user, Moderator $moderator)
    {
        return true;
    }


    public function restore(User $user, Moderator $moderator)
    {
        return true;
    }


    public function forceDelete(User $user, Moderator $moderator)
    {
        return true;
    }
}
