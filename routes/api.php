<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\AuthController;

// ==========================
// CATEGORY
// ==========================
Route::apiResource('categories', CategoryController::class);

// ==========================
// PRODUCT
// ==========================
// Specific routes MUST come before apiResource
Route::get('products/search', [ProductController::class,'search']);
Route::delete('products/empty-stock', [ProductController::class,'deleteEmptyStock']);
Route::put('products/{id}/stock', [ProductController::class,'updateStock']);

Route::apiResource('products', ProductController::class);


// ==========================
// TRANSACTION
// ==========================
Route::apiResource('transactions', TransactionController::class)
    ->only(['index','store','show']);

// Default Laravel
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
