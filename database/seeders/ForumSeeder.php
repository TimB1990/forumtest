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
            'children' => 4,
            'name' => 'News',
            'slug' => 'news',
            'image' => null,
        ]);

        // then: Misc
        Forum::create([
            'parent' => 0,
            'children' => 3,
            'name' => 'Misc',
            'slug' => 'misc',
            'image' => null
        ]);

        // general, tech, lifestyle
        Forum::create([
            'parent' => 1,
            'children' => 0,
            'name' => 'General news',
            'slug' => 'general-news',
            'image' => null
        ]);

        Forum::create([
            'parent' => 1,
            'children' => 0,
            'name' => 'Tech news',
            'slug' => 'tech-news',
            'image' => null
        ]);

        Forum::create([
            'parent' => 1,
            'children' => 0,
            'name' => 'Lifestyle news',
            'slug' => 'lifestyle-news',
            'image' => null
        ]);

        // Games, Sport, Media
        Forum::create([
            'parent' => 2,
            'children' => 0,
            'name' => 'Games',
            'slug' => 'games',
        ]);

        Forum::create([
            'parent' => 2,
            'children' => 0,
            'name' => 'Sports',
            'slug' => 'sports'
        ]);

        Forum::create([
            'parent' => 2,
            'children' => 0,
            'name' => 'Media',
            'slug' => 'media'
        ]);
    }
}
