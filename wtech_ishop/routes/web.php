<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/admin-add', [AdminController::class, 'admin_add'])->name('admin.add');
Route::get('/admin-delete', [AdminController::class, 'admin_delete'])->name('admin.delete');
Route::get('/admin-edit', [AdminController::class, 'admin_edit'])->name('admin.edit');

Route::get('/cart-1', [OrderController::class, 'cart1'])->name('cart.1');
Route::get('/cart-2', [OrderController::class, 'cart2'])->name('cart.2');
Route::get('/cart-3', [OrderController::class, 'cart3'])->name('cart.3');
Route::get('/cart-4', [OrderController::class, 'cart4'])->name('cart.4');

Route::get('/category/{id}', [CategoryController::class, 'category'])->name('category');
Route::get('/', [CategoryController::class, 'index'])->name('index');

Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');

Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
Route::get('/account', [UserController::class, 'account'])->name('account');