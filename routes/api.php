<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categories', [CategoryController::class, 'index']);       // List categories
Route::post('/categories', [CategoryController::class, 'create']);      // Create category
Route::put('/categories/{id}', [CategoryController::class, 'update']); // Update category
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // Delete category


Route::get('/products', [ProductController::class, 'index']);       // List products
Route::post('/products', [ProductController::class, 'create']);      // Create category
Route::put('/products/{id}', [ProductController::class, 'update']); // Update category
Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Delete category

