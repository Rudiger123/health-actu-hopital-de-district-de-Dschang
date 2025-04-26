<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'type' => UserType::SuperAdmin,
            'status' => UserStatus::Active,
            'picture' => ''
        ]);

        // Utilisateur Admin Actif
        User::create([
            'name' => 'Admin Actif',
            'email' => 'admin.active@email.com',
            'username' => 'admin_active',
            'password' => Hash::make('12345678'),
            'type' => UserType::Admin,
            'status' => UserStatus::Active,
            'picture' => ''
        ]);

        // Utilisateur Editor Inactif
        User::create([
            'name' => 'Editor Inactif',
            'email' => 'editor.inactive@email.com',
            'username' => 'editor_inactive',
            'password' => Hash::make('12345678'),
            'type' => UserType::Admin,
            'status' => UserStatus::Inactive,
            'picture' => ''
        ]);

        // Utilisateur User En attente
        User::create([
            'name' => 'User En attente',
            'email' => 'user.pending@email.com',
            'username' => 'user_pending',
            'password' => Hash::make('12345678'),
            'type' => UserType::Admin,
            'status' => UserStatus::Active,
            'picture' => ''
        ]);
    }
}
