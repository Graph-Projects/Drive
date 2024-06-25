<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\InvoiceController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {

    //Routes for the products
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    //Routes for the categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //Routes for the addresses
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
    Route::get('/addresses/{id}', [AddressController::class, 'show'])->name('addresses.show');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');

    //Routes for the feedbacks
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('addresses');
    Route::get('/feedbacks/{id}', [FeedbackController::class, 'show'])->name('addresses.show');
    Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('addresses.store');
    Route::put('/feedbacks/{id}', [FeedbackController::class, 'update'])->name('addresses.update');
    Route::delete('/feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('addresses.destroy');

    //Routes for the invoices
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('addresses');
    Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('addresses.show');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('addresses.store');
    Route::put('/invoices/{id}', [InvoiceController::class, 'update'])->name('addresses.update');
    Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])->name('addresses.destroy');
});
