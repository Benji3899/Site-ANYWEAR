<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'price' => $this->faker->numberBetween(100, 1000),
            'date' => now(),
            'rent_start_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'rent_end_at' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'canceled_at' => null,
            'product_id' => Product::factory(),
            'user_id' => User::factory(),
        ];
    }
}
