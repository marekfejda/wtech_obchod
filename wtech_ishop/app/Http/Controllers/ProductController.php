<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        $category = Category::findOrFail($product->category_id);

        $product = Product::with('images')->findOrFail($id);
        return view('pages.detail', compact('product', 'category', 'categories'));
    }
}
