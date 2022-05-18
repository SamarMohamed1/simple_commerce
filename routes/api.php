<?php

use App\Http\Controllers\Api\productController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user apis

//route to delete token to logout
Route::post('logout', UserController::class,'logout');

//route to add user
Route::post('register', UserController::class,'register');

//route to login
Route::post('login', UserController::class,'login');

//route to update user info
Route::post('update/{postId}',UserController::class,'update');


//products apis

//route to delete product
Route::get('delete-product',productController::class,'deleteProduct')->middleware('auth:sanctum');

//route to get all products
Route::get('all-products',productController::class,'allProducts')->middleware('auth:sanctum');

