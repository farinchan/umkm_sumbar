<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'slug' => $this->faker->slug. '-' . $this->faker->unique()->numberBetween(100, 999),
            'content' => $this->faker->paragraphs(20, true),
            'image' => "news_placeholder.jpg",
            'news_categories_id' => $this->faker->numberBetween(1, 3),
            'user_id' => 1,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
