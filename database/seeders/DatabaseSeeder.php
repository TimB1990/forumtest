<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ForumSeeder;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            UserSeeder::class,
            ForumSeeder::class
        ]);
    }
}
