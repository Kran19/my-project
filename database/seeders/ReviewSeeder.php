<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Review;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $products = Product::all();

        foreach ($products as $product) {
            for ($i = 0; $i < 5; $i++) {
                Review::create([
                    'product_id' => $product->id,
                    'user_name' => $faker->name,
                    'user_icon' => null, // Or a placeholder URL if needed
                    'rating' => $faker->randomFloat(1, 3, 5), // Reviews mostly positive
                    'review' => $faker->paragraph,
                    'status' => true,
                ]);
            }
        }
    }
}
