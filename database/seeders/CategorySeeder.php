<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // first: news
        Category::create([
            'parent' => 0,
            'children' => 4,
            'name' => 'News',
            'image' => null,
        ]);

        // then: Misc
        Category::create([
            'parent' => 0,
            'children' => 3,
            'name' => 'Misc',
            'image' => null
        ]);

        // general, tech, lifestyle
        Category::create([
            'parent' => 1,
            'children' => 0,
            'name' => 'News: General',
            'image' => null
        ]);

        Category::create([
            'parent' => 1,
            'children' => 0,
            'name' => 'News: Tech',
            'image' => null
        ]);

        Category::create([
            'parent' => 1,
            'children' => 0,
            'name' => 'News: Lifestyle',
            'image' => null
        ]);

        // Games, Sport, Media
        Category::create([
            'parent' => 2,
            'children' => 0,
            'name' => 'Games'
        ]);

        Category::create([
            'parent' => 2,
            'children' => 0,
            'name' => 'Sports'
        ]);

        Category::create([
            'parent' => 2,
            'children' => 0,
            'name' => 'Media'
        ]);
    }
}
