<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Like, Comment};
use Faker\Factory as Faker;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assurez-vous d'avoir des catégories et des utilisateurs dans la base de données
        $comments = Comment::all();
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            Like::create([
                'comment_id' => $comments->random()->id,
                'ip_address' => $faker->uuid(),
            ]);
        }
        $this->command->info('100 likes ont été créés avec succès.');
    }
}
