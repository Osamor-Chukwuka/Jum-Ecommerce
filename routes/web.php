<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// If you have routes that share a segment of their paths, you can group them in a route prefix group 






Auth::routes();

// Routes that handles Categories
Route::get('/', [CategoriesController::class, 'index'])->name('landing');

// Homepage after Authentication
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// show products in a category
Route::get('/category/products/{products}', [CategoriesController::class, 'show'])->name('show');

// Show add Product form
Route::get('/create', [CategoriesController::class, 'create'])->name('create');

// Store Products
Route::post('/add', [CategoriesController::class, 'store'])->name('store');

// show product full page
Route::get('/products/full/{productDesc}', [CategoriesController::class, 'fullPage'])->name('description');

// Get cart
Route::get('/cart', [CartController::class, 'getCart'])->name('cart');

// Add to cart
Route::post('/products/full/{productDesc}', [CartController::class, 'addCart'])->name('addCart');
