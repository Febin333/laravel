<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');





