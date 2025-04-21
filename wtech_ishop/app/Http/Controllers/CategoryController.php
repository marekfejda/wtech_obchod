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

    public function category($slug, Request $request)
    {
        $currentCategory = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $maxPrice = Product::where('category_id', $currentCategory->id)->max('price');
        
        $priceMin = $request->input('price_min', 0);
        $priceMax = $request->input('price_max', Product::max('price'));

        $sort = $request->input('sort', 'id_asc');

        $productsQuery = Product::with('images')->where('category_id', $currentCategory->id);
        
        $productsQuery->whereBetween('price', [$priceMin, $priceMax]);
        
        $selectedColors = $request->input('colors', []);

        if (!empty($selectedColors)) {
            $productsQuery->whereIn('color_id', $selectedColors);
        }

        $selectedBrands = $request->input('brands', []);

        if (!empty($selectedBrands)) {
            $productsQuery->whereIn('brand_id', $selectedBrands);
        }


        switch ($sort) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            default:
                $productsQuery->orderBy('id', 'asc');
        }

        $products = $productsQuery->paginate(12)->appends([
                                'sort' => $sort,
                                'colors' => $selectedColors,
                                'brands' => $selectedBrands,
                                'price_min' => $priceMin,
                                'price_max' => $priceMax,
                            ]);

        return view('pages.category', compact('categories', 'products', 'brands', 'colors', 'currentCategory', 'sort', 'maxPrice'));
    }

    public function search(Request $request)
    {
        $query = trim(strtolower($request->input('q')));
        $categorySlug = $request->input('category');

        $categories = Category::all();

        // Ak je zadaná kategória, vyhľadávaj len v nej
        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            $products = Product::with('images')
                ->where('category_id', $category->id)
                ->whereRaw('LOWER(name) LIKE ?', ["%{$query}%"])
                ->paginate(12)
                ->appends([
                    'q' => $request->input('q'),
                    'category' => $request->input('category'),
                ]);

            $brands = Brand::all();
            $colors = Color::all();
            $sort = 'id_asc';
            $maxPrice =$products->where('category_id', $category->id)->max('price');


            return view('pages.category', compact('categories', 'products', 'brands', 'colors', 'category', 'sort', 'maxPrice'));

        }

        // Inak vyhľadávaj vo všetkých produktoch a zobraz index
        $products = Product::with('images')
                ->whereRaw('LOWER(name) LIKE ?', ["%{$query}%"])
                ->paginate(12)
                ->appends([
                    'q' => $request->input('q'),
                    'category' => $request->input('category'),
                ]);

        return view('pages.index', compact('categories', 'products'));
    }
}
