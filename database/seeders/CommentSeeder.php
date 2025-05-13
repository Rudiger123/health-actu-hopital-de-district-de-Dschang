<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Comment, Post};
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Assurez-vous d'avoir des catégories et des utilisateurs dans la base de données
         $comments = Comment::all();
         $faker = Faker::create();
         $posts = Post::all();
 
 
         // Créer 20 articles fictifs
         foreach (range(1, 100) as $index) {
            
        Comment::create([
            'post_id' => $posts->random()->id,
            'parent_id' => null,
            'guest_name' => $faker->name(),
            'guest_email' => $faker->email(),
            'content' => $faker->paragraphs(random_int(3, 7), true)
        ]);
             
         }
         $this->command->info('100 comments ont été créés avec succès.');
  
    }
}
