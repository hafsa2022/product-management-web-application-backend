<?php

namespace Database\Factories;
use App\Models\User;

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
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->randomElement(['100', '200', '1000']),
            'size' => $this->faker->randomElement(['100x100', '105x200', '10x20']),
            'type' => $this->faker->randomElement(['Electronics', 'Clothing', 'Furniture']),
            'image' => 'product-image',
            'stock_quantity' => $this->faker->numberBetween(1, 50),
            'user_id' => User::factory(),
        ];
    }
}
