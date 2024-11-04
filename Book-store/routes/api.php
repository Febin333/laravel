<?php
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
// API routes for Book operations
Route::get('/books', [ApiController::class, 'index'])->name('books.index');
Route::post('/books',[BookController::class,'store'])->name('books.store');
Route::get('/books/{id}', [ApiController::class, 'show'])->name('books.show');
Route::put('/books/{id}', [ApiController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [ApiController::class, 'destroy'])->name('books.destroy');
