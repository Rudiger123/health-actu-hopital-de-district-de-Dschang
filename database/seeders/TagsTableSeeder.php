<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Models\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer 10 tags fictifs
        foreach (range(1, 10) as $index) {
            $name = 'Tag ' . $index;
            Tag::create([
                'name' => $name,
            ]);
        }

        $this->command->info('10 tags ont été créés avec succès.');

    }
}
