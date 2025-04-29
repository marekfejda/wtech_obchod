<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $map = [
            [1,6],[2,6],[3,6],[4,6],[5,6],[6,6],[7,6],[8,6],
            [9,6],[10,6],[11,6],[12,6],[13,5],[14,5],[15,5],[16,5],
            [17,4],[18,4],[19,4],[20,4],[21,4],[22,4],[23,5],[24,5],
            [25,5],[26,5],[27,4],[28,4],[29,6],[30,8],[31,5],[32,7],
            [33,4],[34,4],[35,4],[36,4],[37,4],[38,4],[39,4],[40,3],
            [41,5],[42,5],[43,4],[44,4],[45,4],[46,4],[47,3],[48,3],
            [49,3],[50,3],[51,3],[52,3],[53,3],[54,5],[55,5],[56,6],
        ];

        foreach ($map as [$product_id, $count]) {
            for ($i = 1; $i <= $count; $i++) {
                $path = "assets/product_pictures/{$product_id}/{$i}.webp";

                $image_id = DB::table('images')->insertGetId([
                    'path' => $path,
                    
                ],'uid');

                DB::table('product_images')->insert([
                    'product_id' => $product_id,
                    'image_id' => $image_id,
                ]);
            }
        }
    }
}
