<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Bookmark;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            User::create([
                'name' => 'Venosa Sirr Arrumi',
                'username' => 'Venosa257',
                'email' => 'venosa@gmail.com',
                'password' => bcrypt('12345'),
            ]);

        User::factory(2)->create();
        Post::factory(20)->create();
        Bookmark::factory(5)->create();

    }
}