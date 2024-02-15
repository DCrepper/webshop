<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = fake()->word;
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'type' => 'product',
            'status' => 'publish',
            'catalog_visibility' => 'visible',
            'sku' => Str::random(10),
            'price' => fake()->randomFloat(2, 10, 100),
            'regular_price' => fake()->randomFloat(2, 10, 100),
            'sale_price' => fake()->randomFloat(2, 10, 100),
            'stock_quantity' => fake()->numberBetween(1, 100),
            'stock_status' => 'instock',
            'weight' => fake()->randomFloat(2, 0.1, 10),
            'length' => fake()->randomFloat(2, 0.1, 10),
            'width' => fake()->randomFloat(2, 0.1, 10),
            'height' => fake()->randomFloat(2, 0.1, 10),
            'shipping_class' => '',
            'short_description' => fake()->sentence,
            'description' => fake()->sentence,
        ];
    }
}
