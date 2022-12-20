<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'categories_id' => $this->faker->numberBetween(1, 6),
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(1, 1000),
            'description' => $this->faker->sentence(6)
        ];
    }
}
