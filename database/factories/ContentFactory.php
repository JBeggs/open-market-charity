<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(15),
            'description' => fake()->text(50),
            'long_description' => fake()->text(50),
            'additional_information' => fake()->text(50), 
            'image_1' => fake()->imageUrl($width = 800, $height = 600),
            'image_2' => fake()->imageUrl($width = 800, $height = 600),
            'image_3' => fake()->imageUrl($width = 800, $height = 600),
            'image_4' => fake()->imageUrl($width = 800, $height = 600),
            'image_5' => fake()->imageUrl($width = 800, $height = 600),
            'image_6' => fake()->imageUrl($width = 800, $height = 600),
            'slug' => fake()->slug,
            'user_id' => 1,
            'slot_id' => fake()->numberBetween(1, 4)
        ];
    }
}
