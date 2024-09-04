<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

// Replace the existing home route with this new welcome route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// User routes
Route::resource('users', UserController::class);

// Product routes
Route::resource('products', ProductController::class);

// Custom route for liking a product
Route::post('products/{product}/like', [ProductController::class, 'like'])->name('products.like');
