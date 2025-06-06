<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\COlor;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = ['Black', 'White', 'Blue', 'Green', 'Red', 'Pink', 'Yellow', 'Gray', 'Purple', 'Brown'];

        foreach ($colors as $color) {
            Color::create(['color' => $color]);
        }
    }
}
