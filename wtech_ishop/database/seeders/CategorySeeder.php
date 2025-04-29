<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category' => 'iPhone', 'icon' => 'phone', 'slug' => 'iphone'],
            ['category' => 'Macbook', 'icon' => 'laptop', 'slug' => 'macbook'],
            ['category' => 'iPad', 'icon' => 'tablet', 'slug' => 'ipad'],
            ['category' => 'Audio', 'icon' => 'headphones', 'slug' => 'audio'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
