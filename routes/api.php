<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(UserController::class)->group(function () {

        Route::post('login','getUser');

        Route::post('signup','addUser');

        Route::post('logout','logout');

        // Route::get('getuser','getUserInfo');

    });

Route::controller(ProductController::class)->group(function () {

        Route::get('getproduct/{productId}','getProduct');

        Route::get('getproducts','getAllProducts');

        Route::post('addproduct','addProduct');

        Route::post('editproduct','updateProduct');

        Route::delete('deleteproduct/{id}','deleteProduct');

    });
