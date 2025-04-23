<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        // Créer des sous-catégories pour chaque catégorie parente
            foreach (range(1, 3) as $index) {
                $name = 'Catégorie ' . $index;
                Category::create([
                    'name' => $name,
                    'parent_category_id' => null
                ]);
            }

        $this->command->info('Les catégories et sous-catégories ont été créées avec succès.');
    }
}