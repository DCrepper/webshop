<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WoocommerceProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            'name' => (string) $this->faker->unique()->words(asText: true),
            'type' => (string) $this->faker->randomElement(['simple']),
            'regular_price' => (string) $this->faker->randomNumber(5, false),
            'description' => (string) $this->faker->paragraph,
            'short_description' => (string) $this->faker->sentence,
            'status' => (string) 'publish',
            'sku' => (string) $this->faker->ean13,
        ];
    }
}
