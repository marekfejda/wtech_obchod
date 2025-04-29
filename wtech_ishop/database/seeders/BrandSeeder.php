<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Apple', 'Marshall', 'JBL'];

        foreach ($brands as $brand) {
            Brand::create(['brand' => $brand]);
        }
    }
}
