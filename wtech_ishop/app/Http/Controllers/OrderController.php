<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function cart1()
    {
        return view('pages.cart1');
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


        $order = Order::where('user_id', $user->id)
            ->where('state', 'in cart')
            ->first();

        //Ak nema kosik /(ak nema objednavku v stave "in cart"), vytvor novu objednavku
        if (!$order) {
            $order = Order::create([
                'user_id' => $user->id,
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
                'state' => 'in cart',
                'created_at' => now(),
            ]);
        }

        $existing = OrderProduct::where('order_id', $order->id)
            ->where('product_id', $productId)
            ->first();

        $quantity = (int) $request->input('quantity', 1);
        $totalRequested = $quantity + ($existing->amount ?? 0);
        $product = Product::find($productId);
        if ($totalRequested > $product->stockquantity) {
            return redirect()->back()->with('error', 'Na sklade nie je dostatok kusov. ' . $product->stockquantity . ' kusov je k dispozícii.');
        }
            

        if ($existing) {
            $existing->amount += $quantity;
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