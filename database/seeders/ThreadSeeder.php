<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{

    public function run()
    {
        // call tread factory for 10 threads and create 5 posts for them each
        Thread::factory()->count(20)->has(Post::factory()->count(10)->state(function(array $attributes, Thread $thread){
            return [
                'thread_id' => $thread->id
            ];
        }))->create();
    }
}
