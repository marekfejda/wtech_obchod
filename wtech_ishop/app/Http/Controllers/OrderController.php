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
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->with('error', 'Musíte byť prihlásený.');
        }

        // Grab the in‑cart order or abort
        $order = Order::where('user_id', $user->id)
            ->where('state', 'in cart')
            ->firstOrFail();

        // Fetch the products with prices
        $cartItems = OrderProduct::with('product')->where('order_id', $order->id)->get();

        // Calculate total
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->amount;
        });

        return view('pages.cart2', compact('order', 'total'));
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
                'cvc' => null,
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


    public function storeShipping(Request $request)
    {
        $user = session('user');
        if (!$user) {
            return redirect()->route('login')->with('error', 'Musíte byť prihlásený.');
        }

        $order = Order::where('user_id', $user->id)
            ->where('state', 'in cart')
            ->firstOrFail();

        // Validate inputs
        $data = $request->validate([
            'name_surname'           => 'required|string|max:255',
            'address_streetnumber'   => 'required|string|max:255',
            'PSC'                    => 'required|string|max:20',
            'city'                   => 'required|string|max:100',
            'country'                => 'required|string|in:SK,CZ',
            'phone_number'           => 'required|string|max:30',
            'email'                  => 'required|email|max:255',
        ]);

        // Combine city & country into your single field, if that's your design:
        $data['city_country'] = $data['city'] . ', ' . $data['country'];

        // Fill the order
        $order->fill([
            'name_surname'         => $data['name_surname'],
            'address_streetnumber' => $data['address_streetnumber'],
            'PSC'                  => $data['PSC'],
            'city_country'         => $data['city_country'],
            'phone_number'         => $data['phone_number'],
            'email'                => $data['email'],
        ])->save();

        // Now move on to step 3
        return redirect()->route('cart.3');
    }
}