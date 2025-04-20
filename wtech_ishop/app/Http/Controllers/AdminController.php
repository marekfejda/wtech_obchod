<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_add() { return view('pages.admin_add'); }
    public function admin_delete() { return view('pages.admin_delete'); }
    public function admin_edit() { return view('pages.admin_edit'); }
}
