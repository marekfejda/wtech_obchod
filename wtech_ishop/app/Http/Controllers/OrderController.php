<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected function getUserIdentifier()
    {
        $user = session('user');
        if ($user) {
            return ['key' => 'user_id', 'value' => $user->id];
        }

        if (!session()->has('temp_user_id')) {
            session(['temp_user_id' => random_int(100000, 999999)]);
        }

        return ['key' => 'temp_user_id', 'value' => session('temp_user_id')];
    }

    public function cart1()
    {
        $identifier = $this->getUserIdentifier();

        $order = Order::where($identifier['key'], $identifier['value'])
            ->where('state', 'in cart')
            ->first();

        $cartItems = collect();
        $total = 0.00;

        if ($order) {
            $cartItems = OrderProduct::with(['product.images'])
                ->where('order_id', $order->id)
                ->get();

            $total = $cartItems->sum(fn($item) => $item->product->price * $item->amount);
        }

        return view('pages.cart1', compact('cartItems', 'total'));
    }

    public function cart2()
    {
        $identifier = $this->getUserIdentifier();

        $order = Order::where($identifier['key'], $identifier['value'])
            ->where('state', 'in cart')
            ->firstOrFail();

        $cartItems = OrderProduct::with('product')->where('order_id', $order->id)->get();

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->amount);

        return view('pages.cart2', compact('order', 'total'));
    }

    public function cart3()
    {
        $identifier = $this->getUserIdentifier();

        $order = Order::where($identifier['key'], $identifier['value'])
            ->where('state', 'in cart')
            ->firstOrFail();

        $cartItems = OrderProduct::with('product')
            ->where('order_id', $order->id)
            ->get();

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->amount);

        return view('pages.cart3', compact('order', 'cartItems', 'total'));
    }

    public function cart4()
    {
        $identifier = $this->getUserIdentifier();

        $order = Order::where($identifier['key'], $identifier['value'])
            ->where('state', 'placed')
            ->latest()
            ->firstOrFail();

        return view('pages.cart4', compact('order'));
    }

    public function addToCart(Request $request, $productId)
    {
        $identifier = $this->getUserIdentifier();
        $product = Product::findOrFail($productId);
        $quantity = (int) $request->input('quantity', 1);
        $isUpdate = $request->has('update');

        $order = Order::firstOrCreate(
            array_merge([$identifier['key'] => $identifier['value']], ['state' => 'in cart']),
            [
                'name_surname'         => '',
                'address_streetnumber' => '',
                'PSC'                  => '',
                'city_country'         => '',
                'phone_number'         => '',
                'email'                => '',
                'payment_type'         => '',
                'card_number'          => null,
                'exp_date'             => null,
                'cvc'                  => null,
                'card_holder'          => '',
                'created_at'           => now(),
            ]
        );

        $existing = OrderProduct::where('order_id', $order->id)
            ->where('product_id', $productId)
            ->first();

        if ($quantity === 0 && $existing) {
            $existing->delete();
            return redirect()->back();
        }

        $totalRequested = $isUpdate ? $quantity : ($existing->amount ?? 0) + $quantity;

        if ($totalRequested > $product->stockquantity) {
            return redirect()->back()->with('error', 'Na sklade nie je dostatok kusov. (' . $product->stockquantity . ' ks)');
        }

        if ($existing) {
            $existing->amount = $totalRequested;
            $existing->save();
        } else {
            OrderProduct::create([
                'order_id'   => $order->id,
                'product_id' => $productId,
                'amount'     => $quantity,
            ]);
        }

        return redirect()->back();
    }

    public function storeShipping(Request $request)
    {
        $identifier = $this->getUserIdentifier();

        $order = Order::where($identifier['key'], $identifier['value'])
            ->where('state', 'in cart')
            ->firstOrFail();

        $data = $request->validate([
            'name_surname'         => 'required|string|max:255',
            'address_streetnumber' => 'required|string|max:255',
            'PSC'                  => 'required|string|max:20',
            'city'                 => 'required|string|max:100',
            'country'              => 'required|string|in:SK,CZ',
            'phone_number'         => 'required|string|max:30',
            'email'                => 'required|email|max:255',
        ]);

        $data['city_country'] = $data['city'] . ', ' . $data['country'];

        $order->fill([
            'name_surname'         => $data['name_surname'],
            'address_streetnumber' => $data['address_streetnumber'],
            'PSC'                  => $data['PSC'],
            'city_country'         => $data['city_country'],
            'phone_number'         => $data['phone_number'],
            'email'                => $data['email'],
        ])->save();

        return redirect()->route('cart.3');
    }

    public function storePayment(Request $request)
    {
        $identifier = $this->getUserIdentifier();

        $order = Order::where($identifier['key'], $identifier['value'])
            ->where('state', 'in cart')
            ->firstOrFail();

        $paymentType = $request->input('payment_type');

        if ($paymentType === 'card') {
            $validated = $request->validate([
                'card_number' => 'required|string|max:20',
                'exp_date'    => 'required|string|max:6',
                'cvc'         => 'required|string|max:4',
                'card_holder' => 'required|string|max:255',
            ]);

            $order->fill([
                'payment_type' => 'card',
                'card_number'  => $validated['card_number'],
                'exp_date'     => $validated['exp_date'],
                'cvc'          => $validated['cvc'],
                'card_holder'  => $validated['card_holder'],
                'state'        => 'placed',
            ])->save();

        } elseif ($paymentType === 'cash') {
            $order->fill([
                'payment_type' => 'cash',
                'state'        => 'placed',
                'card_number'  => null,
                'exp_date'     => null,
                'cvc'          => null,
            ])->save();
        }

        // Update sklad
        $items = OrderProduct::where('order_id', $order->id)->get();
        foreach ($items as $item) {
            Product::where('id', $item->product_id)
                ->decrement('stockquantity', $item->amount);
        }

        return redirect()->route('cart.4');
    }
}