<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\AuthController;

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

Route::get('products',[ProductController::class,'productFromCategory']);
// Route::post('register', [AuthApiController::class,'register']);




    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function ($router) { 
        Route::post('registerUser', [AuthController::class,'register']);
        Route::post('loginUser', [AuthController::class,'login'])->name('loginUser');
        Route::post('logout', [AuthController::class,'logout'] );
        Route::post('refresh', [AuthController::class,'refresh'] );
        Route::post('me', [AuthController::class,'me'] );
    });

