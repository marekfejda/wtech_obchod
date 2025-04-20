<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() { return view('pages.about_us'); }
    public function account() { return view('pages.account'); }
    public function admin_add() { return view('pages.admin_add'); }
    public function admin_delete() { return view('pages.admin_delete'); }
    public function admin_edit() { return view('pages.admin_edit'); }
    public function cart1() { return view('pages.cart1'); }
    public function cart2() { return view('pages.cart2'); }
    public function cart3() { return view('pages.cart3'); }
    public function cart4() { return view('pages.cart4'); }
    public function category() { return view('pages.category'); }
    public function contact() { return view('pages.contact'); }
    public function detail() { return view('pages.detail'); }
    public function index() { return view('pages.index'); }
    public function login() { return view('pages.login'); }
    public function register() { return view('pages.register'); }
}
