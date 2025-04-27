<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{ParentCategory,Category};
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer des sous-catégories pour chaque catégorie parente
        foreach (range(1, 5) as $index) {
            $name = 'Catégorie parente' . $index;
            ParentCategory::create([
                'name' => $name,
            ]);
        }

        $categoryParents = ParentCategory::all();
        // Créer des sous-catégories pour chaque catégorie parente
            foreach (range(1, 10) as $index) {
                $name = 'Catégorie ' . $index;
                Category::create([
                    'name' => $name,
                    'parent_category_id' => $categoryParents->random()->id
                ]);
            }

        $this->command->info('Les catégories et sous-catégories ont été créées avec succès.');
    }
}