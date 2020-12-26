<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Post $post)
    {
        //
    }

    public function create(User $user)
    {
        return $user->active ? Response::allow() : Response::deny('You must have an active account to create any post');
    }

    public function update(User $user, Post $post)
    {
        $user->active && $user->id == $post->user_id || $this->allowMaintenance($user, $post) ? Response::allow() : Response::deny('You can only update your own posts or be moderator');
    }

    public function delete(User $user, Post $post)
    {
        $user->active && $this->allowMaintenance($user,$post) ? Response::allow() : Response::deny('You have not been assigned to soft delete any posts in this forum');
    }


    public function restore(User $user, Post $post)
    {
        $user->active && $this->allowMaintenance($user,$post) ? Response::allow() : Response::deny('You have not been assigned to restore any posts in this forum');
    }

    public function forceDelete(User $user, Post $post)
    {
        return $user->active && $user->role == 'admin' ? Response::allow() : Response::deny('You are not authorized to force delete posts');
    }

    private function allowMaintenance(User $user, Post $post){
        if($user->role == 'admin') return true;

        $moderators = $post->forum->moderators;
        if($user->role == 'moderator' && count($moderators) > 0 ){
            $moderators->map(function($mod) use($user){
                return $mod->id == $user->id;
            });
        }
    }
}
