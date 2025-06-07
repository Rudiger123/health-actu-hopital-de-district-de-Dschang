<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactMessageSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR');

        // Créer 20 messages fictifs
        for ($i = 0; $i < 20; $i++) {
            $isReplied = $faker->boolean(30); // 30% de chance d'avoir une réponse
            $isRead = $faker->boolean(70); // 70% de chance d'être lu

            $message = ContactMessage::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'subject' => $faker->sentence(3),
                'message' => $faker->paragraphs(2, true),
                'is_read' => $isRead,
                'reply' => $isReplied ? $faker->paragraphs(2, true) : null,
                'replied_at' => $isReplied ? $faker->dateTimeBetween('-1 month', 'now') : null,
                'created_at' => $faker->dateTimeBetween('-3 months', 'now'),
                'updated_at' => $faker->dateTimeBetween('-3 months', 'now'),
            ]);
        }
    }
}
