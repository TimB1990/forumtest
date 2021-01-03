<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
            'image' => 'image',
            'role' => 'admin',
            'rank' => 1,
            'active' => true
        ]);

        User::create([
            'name' => 'moderator',
            'email' => 'morderator@test.com',
            'password' => bcrypt('moderator'),
            'image' => 'image',
            'role' => 'moderator',
            'rank' => 1,
            'active' => true
        ]);

        User::create([
            'name' => 'member',
            'email' => 'member@test.com',
            'password' => bcrypt('member'),
            'image' => 'image',
            'role' => 'member',
            'rank' => 1,
            'active' => true
        ]);

        // create more by using factory
    }
}


