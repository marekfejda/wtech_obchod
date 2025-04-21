<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function cart1()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Musíte byť prihlásený.');
        }

        $order = Order::where('user_id', $user->id)
            ->where('state', 'in cart')
            ->first();

        $cartItems = [];

        if ($order) {
            $cartItems = OrderProduct::with(['product' => function ($query) {
                $query->with('images');
            }])->where('order_id', $order->id)->get();
        }

        return view('pages.cart1', compact('cartItems'));
    }

    public function cart2()
    {
        return view('pages.cart2');
    }

    public function cart3()
    {
        return view('pages.cart3');
    }

    public function cart4()
    {
        return view('pages.cart4');
    }

    public function addToCart(Request $request, $productId)
    {
        $user = session('user');

        //TODO - rewrite later
        if (!$user) {
            return redirect()->route('login')->with('error', 'Musíte byť prihlásený.');
        }


        $order = Order::firstOrCreate(
            ['user_id' => $user->id, 'state' => 'in cart'],
            [
                'name_surname' => '',
                'address_streetnumber' => '',
                'PSC' => '',
                'city_country' => '',
                'phone_number' => '',
                'email' => $user->email,
                'payment_type' => '',
                'card_number' => null,
                'exp_date' => null,
                'cvc' => '',
                'card_holder' => '',
                'created_at' => now(),
            ]
        );

        $quantity = (int) $request->input('quantity', 1);
        $isUpdate = $request->has('update');

        $product = Product::findOrFail($productId);

        $existing = OrderProduct::where('order_id', $order->id)
            ->where('product_id', $productId)
            ->first();

        // Correct quantity check
        $totalRequested = $isUpdate ? $quantity : ($existing->amount ?? 0) + $quantity;

        if ($totalRequested > $product->stockquantity) {
            return redirect()->back()->with('error', 'Na sklade nie je dostatok kusov. (' . $product->stockquantity . ' ks)');
        }

        if ($existing) {
            $existing->amount = $totalRequested;
            $existing->save();
        } else {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => (int) $productId,
                'amount' => $quantity,
            ]);
        }

        return redirect()->back();
    }
}