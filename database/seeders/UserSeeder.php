<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Bezhanov\Faker\ProviderCollectionHelper;

class UserSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Avatar($faker));
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
            'image' => $faker->imageUrl(640, 480),
            'role' => 'admin',
            'rank' => 3,
            'active' => true
        ]);

        User::create([
            'name' => 'moderator',
            'email' => 'morderator@test.com',
            'password' => bcrypt('moderator'),
            'image' => $faker->imageUrl(640, 480),
            'role' => 'moderator',
            'rank' => 2,
            'active' => true
        ]);

        User::create([
            'name' => 'member',
            'email' => 'member@test.com',
            'password' => bcrypt('member'),
            'image' => $faker->imageUrl(640, 480),
            'role' => 'member',
            'rank' => 1,
            'active' => true
        ]);

        // create more by using factory
    }
}


