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
            'name' => 'Rudiger Kenne',
            'email' => 'admin@email.com',
            'username' => 'John Doe',
            'password' => Hash::make('12345678'),
            'type' => UserType::SuperAdmin,
            'status' => UserStatus::Active,
            'picture' => '',
            'bio' => $faker->paragraphs(random_int(3, 7), true)
        ]);
    }
}
