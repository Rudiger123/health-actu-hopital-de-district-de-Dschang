<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_name' => $this->faker->name,
            'author_title' => $this->faker->jobTitle,
            'content' => $this->faker->paragraph(3),
            'image' => null, // Vous pouvez ajouter un chemin d'image ici si vous le souhaitez
            'is_approved' => $this->faker->boolean,
        ];
    }
}