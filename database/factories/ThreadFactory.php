<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Thread;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{

    protected $model = Thread::class;

    public function definition()
    {
        // forum ids: 3 -> general-news
        // user ids: 3 -> member, 2 -> moderator, 1 -> admin

        $sentence = $this->faker->sentence(5);
        $randomUserId = rand(1,3);
        $user = User::find($randomUserId)->name;

        return [
            'forum_id' => Arr::random([3,4,5,6,7,8]),
            'user_id' => $randomUserId,
            'user' => $user,
            'title' => $sentence,
            'slug' => Str::kebab($sentence),
            'posts_count' => 0
        ];
    }
}
