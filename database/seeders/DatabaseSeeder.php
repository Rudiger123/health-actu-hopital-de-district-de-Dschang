<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Doctor::factory(15)->create(); // Crée 15 faux docteurs
        \App\Models\Testimonial::factory(10)->create();
        
        $this->call([
            UserSeeder::class,
            CategoriesTableSeeder::class,
            TagsTableSeeder::class,
            PostsTableSeeder::class,
            PostTagTableSeeder::class,
            CommentSeeder::class,
            LikeSeeder::class,
            ContactMessageSeeder::class,
            NewsletterSubscriptionSeeder::class,
        ]);
    }
}
