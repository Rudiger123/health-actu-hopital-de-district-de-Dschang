<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name('male' || 'female'),
            'specialty' => $this->faker->randomElement(['Généraliste', 'Cardiologue', 'Pédiatre', 'Dermatologue', 'Neurologue', 'Orthopédiste']),
            'phone' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'bio' => $this->faker->paragraph(2),
            'profile_picture' => null, // Vous pouvez ajouter un chemin d'image ici si vous le souhaitez
            'is_active' => $this->faker->boolean(80), // 80% de chances d'être actif
        ];
    }
}