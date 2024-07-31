<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\ComboDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderDetailController;

Route::apiResource('order-details', OrderDetailController::class);

Route::apiResource('reviews',ReviewController::class);

Route::apiResource('orders', OrderController::class);

Route::apiResource('cart-details', CartDetailController::class);

Route::apiResource('carts', CartController::class);

Route::apiResource('combo-details', ComboDetailController::class);

Route::apiResource('combos', ComboController::class);

Route::apiResource('dishes', DishController::class);

Route::apiResource('vouchers', VoucherController::class);

Route::apiResource('categories', CategoryController::class);

Route::apiResource('restaurants', RestaurantController::class);

Route::apiResource('users', UserController::class);

//! api for authentication
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


