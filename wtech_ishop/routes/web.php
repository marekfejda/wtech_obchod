<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/account', [PageController::class, 'account'])->name('account');
Route::get('/admin-add', [PageController::class, 'admin_add'])->name('admin.add');
Route::get('/admin-delete', [PageController::class, 'admin_delete'])->name('admin.delete');
Route::get('/admin-edit', [PageController::class, 'admin_edit'])->name('admin.edit');
Route::get('/cart-1', [PageController::class, 'cart1'])->name('cart.1');
Route::get('/cart-2', [PageController::class, 'cart2'])->name('cart.2');
Route::get('/cart-3', [PageController::class, 'cart3'])->name('cart.3');
Route::get('/cart-4', [PageController::class, 'cart4'])->name('cart.4');
Route::get('/category', [PageController::class, 'category'])->name('category');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/detail', [PageController::class, 'detail'])->name('detail');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register'])->name('register');
