<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FashionController;


Route::get('/', function () {
    return view('welcome');
});

// fashion Controller
Route::get('fashion3',[FashionController::class , 'index'])->name('fashion.index');
Route::get('fashions/{id}/show', [FashionController::class,'show'])->name('products.show');

// product Controller
    Route::get('products', [ProductController::class,'index'])->name('products.index');
    Route::get('add product',[ProductController::class , 'create'])->name('fashion.create');
    Route::post('products',[ProductController::class , 'store'])->name('product.store');
    Route::get('products/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
    Route::put('products/{id}', [ProductController::class,'update'])->name('products.update');
    Route::delete('products/delete', [ProductController::class,'destroy'])->name('products.destroy');
    Route::get('trashed', [ProductController::class,'showDeleted'])->name('products.showDeleted');
    Route::patch('products/{id}/restore', [ProductController::class,'restore'])->name('products.restore');
    Route::delete('products/{id}/forceDelete', [ProductController::class,'forceDeleted'])->name('products.forceDeleted');