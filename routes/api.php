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

//verification email api
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

// Resend link to verify email
Route::post('/email/verify/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:api', 'throttle:6,1'])->name('verification.send');


//user apis

//route to delete token to logout
Route::post('logout',[ UserController::class,'logout'])->middleware('auth:sanctum');

//route to add user
Route::post('register', [UserController::class,'register']);

//route to login
Route::post('login',[ UserController::class,'login']);

//route to update user info
Route::post('update',[UserController::class,'update'])->middleware('auth:sanctum');


//products apis

//route to create new product
Route::post('create-products',[productController::class,'CreateProduct'])->middleware('auth:sanctum');

//route to delete product
Route::get('delete-products/{productId}',[productController::class,'deleteProduct'])->middleware('auth:sanctum');

//route to get all products
Route::get('all-products',[productController::class,'allProducts'])->middleware('auth:sanctum');

//route to update products
Route::post('update-products/{productId}',[productController::class,'update'])->middleware('auth:sanctum');

//route to get all products with owner info
Route::get('all-productsDetails',[productController::class,'productsDetails'])->middleware('auth:sanctum');

