<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\ProductController;


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

Route::get("/login", [UserController::class,'index']);
Route::post("/register", [UserController::class,'register']);
Route::get("/logout",function(){
       Session::forget('user');
       return redirect('login');
});

Route::post("/login", [UserController::class,'login']);

Route::get("/", [ProductController::class,'index']);

Route::get("detail/{id}", [ProductController::class,'detail']);

Route::post("add_cart", [ProductController::class,'addCart']);

Route::get("cart", [ProductController::class,'viewCart']);

Route::get("removeCart/{id}", [ProductController::class,'removeCart']);

Route::get("order", [ProductController::class,'order']);

Route::post("checkout", [ProductController::class,'payment']);


