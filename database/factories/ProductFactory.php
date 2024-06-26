<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph(3, true),
            'short_description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(1000, 1000000),
            'discount' => $this->faker->numberBetween(0, 50),
            'stock' => $this->faker->numberBetween(0, 20),
            'product_categories_id' => $this->faker->numberBetween(2, 4),
            'shop_id' => $this->faker->numberBetween(1, 2),
            'weight' => $this->faker->numberBetween(100, 2000),
            'size' => $this->faker->randomElement(['10x5x1', '20x10x1', '30x20x1']),
            'brand' => $this->faker->company,
            'meta_title' => $this->faker->title,
            'meta_description' => $this->faker->sentence,
            'meta_keyword' =>  null,
        ];
    }
}
