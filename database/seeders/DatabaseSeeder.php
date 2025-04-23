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
        $this->call([
            UserSeeder::class,
            CategoriesTableSeeder::class,
            TagsTableSeeder::class,
            PostsTableSeeder::class,
            PostTagTableSeeder::class
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

        // Dans votre fichier de seed (database/seeders/DatabaseSeeder.php ou un PostSeeder dédié)
        DB::table('posts')->insert([
            [
                'title' => 'Découverte de Laravel : Les fondamentaux',
                'slug' => 'decouverte-laravel-fondamentaux',
                'content' => 'Laravel est un framework PHP élégant qui simplifie le développement web. Dans cet article, nous explorerons ses concepts de base : routes, contrôleurs, modèles et vues.',
                'image_path' => 'posts/image.png',
                'category_id' => '1',
                'status' => 'published',
                'featured' => true,
                'allow_comments' => true,
                'user_id' => 1,
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(2)
            ],
            [
                'title' => 'Les nouveautés de PHP 8.2',
                'slug' => 'nouveautes-php-8-2',
                'content' => 'PHP 8.2 apporte plusieurs améliorations de performance et nouvelles fonctionnalités comme les readonly classes et les types stand-alone.',
                'image_path' => 'posts/image.png',
                'category_id' => '1',
                'status' => 'published',
                'featured' => false,
                'allow_comments' => true,
                'user_id' => 1,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDay()
            ],
            [
                'title' => 'Brouillon: Meilleures pratiques UI/UX',
                'slug' => 'best-practices-ui-ux',
                'content' => 'Article en cours de rédaction sur les bonnes pratiques en design d\'interface...',
                'image_path' => 'posts/ui-ux.jpg',
                'category_id' => '1',
                'status' => 'draft',
                'featured' => false,
                'allow_comments' => false,
                'user_id' => 1,
                'created_at' => now()->subDay(),
                'updated_at' => now()->subHour()
            ],
            [
                'title' => 'Optimiser les performances avec Laravel',
                'slug' => 'optimiser-performances-laravel',
                'content' => 'Découvrez comment améliorer les performances de votre application Laravel avec le cache, le lazy loading et l\'optimisation des requêtes.',
                'image_path' => 'posts/laravel-performance.jpg',
                'category_id' => '1',
                'status' => 'published',
                'featured' => true,
                'allow_comments' => true,
                'user_id' => 1,
                'created_at' => now()->subDays(2),
                'updated_at' => now()
            ]
        ]);
    }
}
