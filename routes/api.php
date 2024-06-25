<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CategorySubCategoryController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

 // Routes pour les opérations CRUD sur les produits
Route::prefix('v1')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});

// Routes pour les opérations CRUD sur les catégories
Route::prefix('v1')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
});
Route::prefix('v1')->group(function () {
    Route::get('/subCategory', [SubCategoryController::class, 'index']);
    Route::get('/subCategory/{id}', [SubCategoryController::class, 'show']);
    Route::post('/subCategory', [SubCategoryController::class, 'store']);
    Route::put('/subCategory/{id}', [SubCategoryController::class, 'update']);
    Route::delete('/subCategory/{id}', [SubCategoryController::class, 'destroy']);
});
Route::prefix('v1')->group(function () {
    Route::post('/categories/{categoryId}/sub-categories/{subCategoryId}', [CategorySubCategoryController::class, 'attachSubCategory']);
    Route::delete('/categories/{categoryId}/sub-categories/{subCategoryId}', [CategorySubCategoryController::class, 'detachSubCategory']);
    Route::get('/categories/{categoryId}/sub-categories', [CategorySubCategoryController::class, 'listSubCategories']);
    Route::get('/sub-categories/{subCategoryId}/categories', [CategorySubCategoryController::class, 'listCategories']);
});