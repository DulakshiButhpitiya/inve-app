<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('welcome');

Route::get('/home', function () {
    return ('home');
});
Route::get('/about', function () {
    return ('about');
});

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');