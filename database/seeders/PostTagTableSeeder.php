<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer tous les posts et tags
        $posts = Post::all();
        $tags = Tag::all();

        if ($posts->isEmpty() || $tags->isEmpty()) {
            $this->command->warn('Veuillez d\'abord créer des posts et des tags.');
            return;
        }

        // Associer des tags aléatoires à chaque post
        foreach ($posts as $post) {
            // Associer entre 1 et 5 tags aléatoires à chaque post
            $randomTags = $tags->random(rand(1, 5))->pluck('id');
            $post->tags()->sync($randomTags);
        }

        $this->command->info('Les posts ont été associés à des tags avec succès.');
    }
}
