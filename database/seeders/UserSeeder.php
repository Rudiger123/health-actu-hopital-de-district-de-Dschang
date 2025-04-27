<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'type' => UserType::SuperAdmin,
            'status' => UserStatus::Active,
            'picture' => '',
            'bio' => $faker->paragraphs(random_int(3, 7), true)
        ]);

        // Utilisateur Admin Actif
        User::create([
            'name' => 'Admin Actif',
            'email' => 'admin.active@email.com',
            'username' => 'admin_active',
            'password' => Hash::make('12345678'),
            'type' => UserType::Admin,
            'status' => UserStatus::Active,
            'picture' => '',
            'bio' => $faker->paragraphs(random_int(3, 7), true)
        ]);

        // Utilisateur Editor Inactif
        User::create([
            'name' => 'Editor Inactif',
            'email' => 'editor.inactive@email.com',
            'username' => 'editor_inactive',
            'password' => Hash::make('12345678'),
            'type' => UserType::Admin,
            'status' => UserStatus::Inactive,
            'picture' => '',
            'bio' => $faker->paragraphs(random_int(3, 7), true)
        ]);

        // Utilisateur User En attente
        User::create([
            'name' => 'User En attente',
            'email' => 'user.pending@email.com',
            'username' => 'user_pending',
            'password' => Hash::make('12345678'),
            'type' => UserType::Admin,
            'status' => UserStatus::Active,
            'picture' => '',
            'bio' => $faker->paragraphs(random_int(3, 7), true)
        ]);
    }
}
