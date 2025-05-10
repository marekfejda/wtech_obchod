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
Route::post('/admin/store-product', [AdminController::class, 'store_product'])->name('admin.store_product');
Route::get('/admin-delete', [AdminController::class, 'admin_delete'])->name('admin.delete');
Route::delete('/admin/delete-product', [AdminController::class, 'delete_product'])->name('admin.delete.product');
Route::get('/admin/product-info/{id}', [AdminController::class, 'getProductInfo']);
Route::get('/admin-edit/{product}', [AdminController::class, 'admin_edit'])->name('admin.edit');
Route::post('/admin/update-product', [AdminController::class, 'update_product'])->name('admin.update_product');



Route::post('/cart/add/{productId}', [\App\Http\Controllers\OrderController::class, 'addToCart'])->name('cart.add');
Route::post('/add-to-cart/{productId}', [OrderController::class, 'addToCart'])->name('addToCart');

Route::get('/cart-1', [OrderController::class, 'cart1'])->name('cart.1');
Route::get('/cart-2', [OrderController::class, 'cart2'])->name('cart.2');
Route::post('/cart-2', [OrderController::class, 'storeShipping'])->name('cart.2.store');
Route::get('/cart-3', [OrderController::class, 'cart3'])->name('cart.3');
Route::post('/cart-3', [OrderController::class, 'storePayment'])->name('cart.3.store');
Route::get('/cart-4', [OrderController::class, 'cart4'])->name('cart.4');

Route::get('/category/{slug}', [CategoryController::class, 'category'])->name('category');
Route::get('/search', [CategoryController::class, 'search'])->name('search');
Route::get('/', [CategoryController::class, 'index'])->name('index');

Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');

Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
Route::get('/account', [UserController::class, 'account'])->name('account');