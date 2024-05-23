<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductType;
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

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'size' => $this->faker->randomElement(['S', 'M', 'L']),
            'brand' => $this->faker->company,
            'first_img' => $this->faker->imageUrl,
            'second_img' => $this->faker->imageUrl,
            'type_id' => ProductType::factory(),
            'user_id' => User::factory(),
            'validated_by' => null, // Default to null
        ];
    }
}
