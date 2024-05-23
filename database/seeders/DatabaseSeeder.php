<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(5)->create();

        /*
         * User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        // Créer des types de produits
        ProductType::factory()->count(2)->create();

        // Créer des utilisateurs avec produits et commandes
        User::factory()
            ->has(Product::factory()->count(3))
            ->has(Order::factory()->count(2))
            ->count(5)
            ->create();

    }
}
