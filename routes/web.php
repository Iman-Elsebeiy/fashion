<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('welcome');
});

// fashion Controller
Route::get('fashion',[FashionController::class , 'index'])->name('fashion.index');
Route::get('fashion/products',[FashionController::class , 'product'])->name('products');
Route::get('fashions/{id}/show', [FashionController::class,'show'])->name('products.show');

// product Controller
    Route::get('products', [ProductController::class,'index'])->name('products.index');
    Route::get('add product',[ProductController::class , 'create'])->name('products.create');
    Route::post('product',[ProductController::class , 'store'])->name('product.store');
    Route::get('product/{id}/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::put('product/{id}', [ProductController::class,'update'])->name('product.update');

    Route::delete('products/delete', [ProductController::class,'destroy'])->name('product.destroy');
    Route::get('trashed', [ProductController::class,'showDeleted'])->name('product.showDeleted');
    Route::patch('products/{id}/restore', [ProductController::class,'restore'])->name('products.restore');
    Route::delete('products/{id}/forceDelete', [ProductController::class,'forceDeleted'])->name('products.forceDeleted');

    // contact Controller
 Route::get('add message',[ContactController::class , 'create'])->name('contact.create');
 Route::post('',[ContactController::class , 'store'])->name('contact.store');
