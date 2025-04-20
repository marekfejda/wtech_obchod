<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('images')->take(10)->get();

        return view('pages.index', compact('categories', 'products'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $products = Product::with('images')->where('category_id', $id)->paginate(12);

        return view('pages.category', compact('categories', 'products', 'brands', 'colors'));
    }
}
