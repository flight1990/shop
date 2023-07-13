<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name' => ucfirst($this->faker->words(rand(2,6), true)),
            'description' => $this->faker->realText(2000),
            'price' => $this->faker->randomFloat(2, 100, 1500),
            'category_id' => Category::query()->inRandomOrder()->value('id')
        ];
    }
}
