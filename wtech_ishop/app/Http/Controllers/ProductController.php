<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('pages.detail', compact('product'));
    }
}
