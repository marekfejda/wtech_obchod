<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin_add()
    {
        $categories = Category::all();
        $colors = Color::all();
        $brands = Brand::all();

        return view('pages.admin_add', compact('categories', 'colors', 'brands'));
    }

    public function store_product(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'color_id' => 'required|exists:colors,id',
            'price' => 'required|numeric',
            'stockQuantity' => 'required|integer',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048'
        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'brand_id' => $validated['brand_id'],
            'category_id' => $validated['category_id'],
            'color_id' => $validated['color_id'],
            'price' => $validated['price'],
            'stockQuantity' => $validated['stockQuantity'],
            'description' => $validated['description'] ?? null,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('products', 'public');

                $image = Image::create(['path' => $path]);
                $product->images()->attach($image->uid);
            }
        }

        return redirect()->back()->with('success', 'Produkt bol pridaný!');
    }

    public function admin_delete()
    {
        return view('pages.admin_delete');
    }
    public function admin_edit()
    {
        return view('pages.admin_edit');
    }
}
