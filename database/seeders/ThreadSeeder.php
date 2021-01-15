<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Forum;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{

    public function run()
    {
        // set random number of threads & posts
        $numberOfThreads = rand(10, 25);
        $numberOfPosts = rand(5, 20);

        $index = 0;

        // make records using factory
        $threads = Thread::factory()->state(
            ['posts_count' => $numberOfPosts]
        )
            ->count($numberOfThreads)->has(Post::factory()->count($numberOfPosts)->state(function (array $attributes, Thread $thread) use (&$index) {

                $userid = $index > 0 ? rand(1,3) : $thread->user_id;
                $username = User::find($userid)->name;

                $index++;

                return [
                    'thread_id' => $thread->id,
                    'user' => $username,
                    'user_id' => $userid
                ];
            }))->create();

        // update each forum's threads and posts count
        $threads->each(function ($thread) {

            // find forum given by thread's forum_id
            $forum = Forum::find($thread->forum_id);
            $forum->threads_count++;
            $forum->posts_count += $thread->posts->count();
            $forum->save();
        });
    }
}
