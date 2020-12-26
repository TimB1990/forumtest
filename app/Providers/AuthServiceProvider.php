<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Forum;
use App\Models\Moderator;
use App\Policies\PostPolicy;
use App\Policies\ForumPolicy;
use App\Policies\ModeratorPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Forum::class => ForumPolicy::class,
        Moderator::class => ModeratorPolicy::class,
        Post::class => PostPolicy::class,
        Tag::class => TagPolicy::class,
        Thread::class => ThreadPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

    }
}
