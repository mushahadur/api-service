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


// Group for CategoryController
// Route::controller(CategoryController::class)->prefix('categories')->group(function () {
//     Route::get('/', 'index');        // List categories
//     Route::post('/', 'store');       // Create category
//     Route::put('/{id}', 'update');   // Update category
//     Route::delete('/{id}', 'destroy'); // Delete category
// });

//  // Group for ProductController
//  Route::controller(ProductController::class)->prefix('products')->group(function () {
//     Route::get('/', 'index');        // List products
//     Route::post('/', 'store');       // Create product
//     Route::put('/{id}', 'update');   // Update product
//     Route::delete('/{id}', 'destroy'); // Delete product
// });