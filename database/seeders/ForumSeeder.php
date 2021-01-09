<?php

namespace Database\Seeders;

use App\Models\Forum;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // first: news
        Forum::create([
            'parent' => 0,
            'name' => 'News',
            'slug' => 'news',
            'image' => null,
            'threads_count' => 0,
            'posts_count' => 0
        ]);

        // then: Misc
        Forum::create([
            'parent' => 0,
            'name' => 'Misc',
            'slug' => 'misc',
            'image' => null,
            'threads_count' => 0,
            'posts_count' => 0
        ]);

        // general, tech, lifestyle
        Forum::create([
            'parent' => 1,
            'name' => 'General news',
            'slug' => 'general-news',
            'image' => null,
            'threads_count' => 0,
            'posts_count' => 0
        ]);

        Forum::create([
            'parent' => 1,
            'name' => 'Tech news',
            'slug' => 'tech-news',
            'image' => null,
            'threads_count' => 0,
            'posts_count' => 0
        ]);

        Forum::create([
            'parent' => 1,
            'name' => 'Lifestyle news',
            'slug' => 'lifestyle-news',
            'image' => null,
            'threads_count' => 0,
            'posts_count' => 0
        ]);

        // Games, Sport, Media
        Forum::create([
            'parent' => 2,
            'name' => 'Games',
            'slug' => 'games',
            'image' => null,
            'threads_count' => 0,
            'posts_count' => 0
        ]);

        Forum::create([
            'parent' => 2,
            'name' => 'Sports',
            'slug' => 'sports',
            'image' => null,
            'threads_count' => 0,
            'posts_count' => 0
        ]);

        Forum::create([
            'parent' => 2,
            'name' => 'Media',
            'slug' => 'media',
            'image' => null,
            'threads_count' => 0,
            'posts_count' => 0
        ]);
    }
}
