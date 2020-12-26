<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability){
        return $user->role == 'admin' ? Response::allow() : Response::deny('Only the admin is allowed to maintain tags');
    }


    public function create(User $user)
    {
        return true;
    }


    public function update(User $user, Tag $tag)
    {
        return true;
    }


    public function delete(User $user, Tag $tag)
    {
        return true;
    }


    public function restore(User $user, Tag $tag)
    {
        return true;
    }

    public function forceDelete(User $user, Tag $tag)
    {
        return true;
    }
}
