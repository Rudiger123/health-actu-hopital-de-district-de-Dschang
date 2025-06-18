<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Assurez-vous d'avoir des catégories et des utilisateurs dans la base de données
        $categories = Category::all();
        $users = User::all();
        $faker = Faker::create();


        if ($categories->isEmpty() || $users->isEmpty()) {
            $this->command->warn('Veuillez d\'abord créer des catégories et des utilisateurs.');
            return;
        }

        // Créer 20 articles fictifs
        foreach (range(1, 20) as $index) {
            Post::create([
                'title' => $faker->sentence,
                'content' => $faker->paragraphs(random_int(3, 7), true), // 3 à 7 paragraphes
                'category_id' => $categories->random()->id,
                'status' => ['draft', 'published', 'archived'][array_rand(['draft', 'published', 'archived'])],
                'image_path' => '/posts/image.jpg',
                'featured' => (bool)random_int(0, 1),
                'allow_comments' => (bool)random_int(0, 1),
                'user_id' => $users->random()->id,
                'published_at' => now()->subDays(random_int(0, 30)),
            ]);
        }
        $this->command->info('30 articles ont été créés avec succès.');
    }
}