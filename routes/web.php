<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/language/{locale}', [HomeController::class, 'setLocale'])->name('locale');


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/services', [HomeController::class, 'services'])->name('services');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::get('grand', [\App\Http\Controllers\GrandController::class, 'index'])->name('brands.index');
