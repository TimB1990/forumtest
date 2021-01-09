<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => Arr::random([1,2,3]),
            'thread_id' => 0,
            'forum_id' => Arr::random([3,4,5,6,7,8]),
            'parent_id' => 0,
            'message' => $this->faker->paragraphs(4, true)
        ];
    }
}
