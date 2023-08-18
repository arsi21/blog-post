<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();
        User::factory(10)->create();

        // $user = User::factory()->create([
        //     'name' => 'John Doe',
        //     'email' => 'test@example.com',
        // ]);

        // Post::factory(15)->create([
        //     'user_id' => $user->id,
        // ]);
        Post::factory(100)->create();
        Comment::factory(20)->create();
    }
}
