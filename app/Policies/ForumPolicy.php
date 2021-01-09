<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{
    use HandlesAuthorization;

    // equavalent to controller 'create' and 'store'
    public function create(User $user)
    {
        return $user->role == 'admin' ? Response::allow() : Response::deny('You must be admin to create new forum');
    }


    // equavalent to controller 'update'
    public function update(User $user, Forum $forum)
    {
        return $user->role == 'admin' ? Response::allow() : Response::deny('You must be admin to update forum');
    }


    public function delete(User $user, Forum $forum)
    {
        return $user->role == 'admin' ? Response::allow() : Response::deny('You must be admin to delete forum');
    }

    public function restore(User $user, Forum $forum)
    {
        return $user->role == 'admin' ? Response::allow() : Response::deny('You must be admin to restore forum');
    }

    public function forceDelete(User $user, Forum $forum)
    {
        return $user->role == 'admin' ? Response::allow() : Response::deny('You must be admin to force delete forum');
    }
}
