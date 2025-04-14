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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
        ]);

         // 2. Seed des catégories
         DB::table('categories')->insert([
            [
                'name' => 'Technologie',
                'slug' => 'technologie',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Voyage',
                'slug' => 'voyage',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // 3. Seed des tags
        DB::table('tags')->insert([
            ['name' => 'Laravel', 'slug' => 'laravel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PHP', 'slug' => 'php', 'created_at' => now(), 'updated_at' => now()]
        ]);

        // 4. Seed des articles
        DB::table('posts')->insert([
            [
                'title' => 'Mon premier article sur Laravel',
                'slug' => 'premier-article-laravel',
                'content' => 'Contenu détaillé de mon premier article...',
                'excerpt' => 'Un aperçu de mon expérience avec Laravel',
                'featured_image' => 'https://example.com/images/laravel.jpg',
                'status' => 'published',
                'author_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // 5. Seed des relations many-to-many
        DB::table('post_category')->insert([
            ['post_id' => 1, 'category_id' => 1]
        ]);

        DB::table('post_tag')->insert([
            ['post_id' => 1, 'tag_id' => 1]
        ]);

        // 6. Seed des commentaires
        DB::table('comments')->insert([
            [
                'post_id' => 1,
                'user_id' => 2,
                'content' => 'Super article, merci pour ces informations!',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        
    
    }
}
