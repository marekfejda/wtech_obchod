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
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as InterventionImage;

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
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'color_id' => 'required|exists:colors,id',
            'price' => 'required|numeric',
            'stockQuantity' => 'required|integer',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'nullable|image|max:2048'
        ]);
        

        $product = Product::create([
            'name' => $validated['name'],
            'brand_id' => $validated['brand_id'],
            'category_id' => $validated['category_id'],
            'color_id' => $validated['color_id'],
            'price' => $validated['price'],
            'stockquantity' => $validated['stockQuantity'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
        ]);

        if ($request->hasFile('images')) 
        {
            $files = $request->file('images');
            $baseDir = public_path("assets/product_pictures/{$product->id}");
            // 1) make product folder if it doesn't exist
            if (! File::exists($baseDir)) 
            {
                File::makeDirectory($baseDir, 0755, true);
            }

            $counter = 1;
            foreach ($files as $file) 
            {
                // original extension
                $ext = strtolower($file->getClientOriginalExtension());
                // target filename and full path
                $isWebp = ($ext === 'webp');
                $filename = $counter . ($isWebp ? '.webp' : ".$ext");
                $fullPath = "{$baseDir}/{$filename}";

                try 
                {
                    // 2) use Intervention to read/convert
                    $img = InterventionImage::make($file->getRealPath());
                    if (! $isWebp) 
                    {
                        // convert to webp with 90% quality
                        $img->encode('webp', 90)->save($fullPath);
                        $filename = $counter . '.webp';
                    } 
                    else 
                    {
                        // already webp: just save
                        $img->save($fullPath);
                    }
                } 
                catch (\Exception $e) 
                {
                    // fallback: just move the file
                    $file->move($baseDir, $filename);
                }

                // 3) record path relative to public/
                $relativePath = "assets/product_pictures/{$product->id}/{$filename}";
                $imgModel = Image::create(['path' => $relativePath]);

                // 4) pivot
                $product->images()->attach($imgModel->uid);

                $counter++;
            }
        }

        return redirect()->back()->with('success', 'Produkt bol pridaný!');
    }

    public function admin_delete()
    {
        return view('pages.admin_delete');
    }

    public function delete_product(Request $request)
    {
        $id = $request->input('product_id');
        $product = Product::find($id);

        $images = $product->images;

        foreach ($images as $image) {
            $imagePath = public_path($image->path);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete();
        }

        $product->delete();
        return redirect()->back()->with('success', 'Produkt bol odstránený.');
    }


    public function getProductInfo($id)
    {
        $product = Product::with('images')->find($id);

        if (!$product) {
            return response()->json(['message' => 'Produkt nenájdený'], 404);
        }

        return response()->json([
            'name' => $product->name,
            'image' => $product->images->first()?->path ? asset($product->images->first()->path) : null,
        ]);
    }


    public function admin_edit()
    {
        return view('pages.admin_edit');
    }
}
