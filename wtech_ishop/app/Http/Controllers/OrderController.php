<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cart1() { return view('pages.cart1'); }
    public function cart2() { return view('pages.cart2'); }
    public function cart3() { return view('pages.cart3'); }
    public function cart4() { return view('pages.cart4'); }
}
