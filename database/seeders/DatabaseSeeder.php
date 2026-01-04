<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['login' => 'admin'],
            ['name' => 'Admin', 'password' => 'password']
        );

        Post::create([
            'title' => 'Hello World',
            'content' => 'This is my first post. Welcome to my minimalist blog.',
            'published_at' => now(),
        ]);

        Post::create([
            'content' => 'A micro-post without a title. Just a quick thought.',
            'published_at' => now()->subDay(),
        ]);
    }
}
