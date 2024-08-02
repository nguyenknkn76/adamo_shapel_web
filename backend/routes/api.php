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
use App\Http\Controllers\CityController;
use App\Http\Controllers\RestaurantCategoryController;
use App\Models\Dish;
use App\Models\Restaurant;

Route::apiResource('restaurant_categories', RestaurantCategoryController::class);

Route::apiResource('cities', CityController::class);

Route::apiResource('order-details', OrderDetailController::class);

Route::apiResource('reviews',ReviewController::class);

Route::apiResource('orders', OrderController::class);

Route::apiResource('cart-details', CartDetailController::class);

Route::apiResource('carts', CartController::class);

Route::apiResource('combo-details', ComboDetailController::class);

Route::apiResource('combos', ComboController::class);
//* API to get combos after choosed restaurant 
//* sample api: GET http://localhost:8000/api/combos/restaurant_id/3
Route::get('combos/restaurant_id/{restaurant_id}', [ComboController::class, 'getByRestaurantId']);

Route::apiResource('dishes', DishController::class);
//* API to get dishes after choosed restaurant 
//* sample api: GET http://localhost:8000/api/dishes/restaurant_id/3
Route::get('dishes/restaurant_id/{restaurant_id}', [DishController::class, 'getByRestaurantId']);

Route::apiResource('vouchers', VoucherController::class);

Route::apiResource('categories', CategoryController::class);

Route::apiResource('restaurants', RestaurantController::class);

//* API to get restaurents by (2 prams) city_id and restaurant_category_id 
//* sample api: GET http://localhost:8000/api/restaurants?city_id=4&restaurant_category_id=4 
Route::get('restaurants/filter', [RestaurantController::class, 'getByCityAndCategory']);
Route::get('restaurants/city/{city_id}', [RestaurantController::class, 'getByCity']);
Route::get('restaurants/category/{category_id}', [RestaurantController::class, 'getByCategory']);

Route::apiResource('users', UserController::class);

//! api for authentication
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


