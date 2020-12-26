<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Thread;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->active ? Response::allow() : Response::deny('you must have an active account to create new thread');
    }


    public function update(User $user, Thread $thread)
    {
        return $this->allowMaintenance($user, $thread) ? Response::allow() : Response::deny('You have not been assigned to update any threads in this forum');
    }


    public function delete(User $user, Thread $thread)
    {
        return $this->allowMaintenance($user, $thread) ? Response::allow() : Response::deny('You have not been assigned to soft delete any threads in this forum');
    }


    public function restore(User $user, Thread $thread)
    {
        return $this->allowMaintenance($user, $thread) ? Response::allow() : Response::deny('You have not been assigned to restore any threads in this forum');
    }


    public function forceDelete(User $user)
    {
        return $user->active && $user->role == 'admin' ? Response::allow() : Response::deny('You are not authorized to force delete threads');
    }

    private function allowMaintenance(User $user, Thread $thread){
        if($user->role == 'admin') return true;

        $moderators = $thread->forum->moderators;
        if($user->role == 'moderator' && count($moderators) > 0 ){
            $moderators->map(function($mod) use($user){
                return $mod->id == $user->id;
            });
        }
    }
}
