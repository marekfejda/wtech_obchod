<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 15 Black',
                'brand_id' => 1,
                'category_id' => 1,
                'color_id' => 1,
                'price' => 899.99,
                'stockQuantity' => 99,
                'short_description' => '6,1\\" Super Retina XDR OLED, RAM 6 GB, ROM 256 GB',
                'description' => 'Mobilný telefón - 6,1\\" Super Retina XDR OLED 2556 x 1179, operačná pamäť 6 GB...',
                'created_at' => now(),
                'updated_at' => now(),],
            [
                'name' => 'iPhone 15 Blue',
                'brand_id' => 1,
                'category_id' => 1,
                'color_id' => 3,
                'price' => 899.99,
                'stockQuantity' => 99,
                'short_description' => '6,1\\" Super Retina XDR OLED, RAM 6 GB, ROM 256 GB',
                'description' => 'Mobilný telefón - 6,1\\" Super Retina XDR OLED 2556 x 1179, operačná pamäť 6 GB...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ... Add other products in a similar format
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
