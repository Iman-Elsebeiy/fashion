<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FashionController;


Route::get('/', function () {
    return view('welcome');
});

// fashion Controller
Route::get('fashion3',[FashionController::class , 'index'])->name('fashion.index');

// product Controller
Route::get('add product',[ProductController::class , 'create'])->name('fashion.create');
Route::post('added',[ProductController::class , 'store'])->name('product.store');
