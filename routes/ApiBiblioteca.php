<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookGenereController;
use App\Http\Controllers\BookGenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewUsuaryController;


Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index');
    Route::post('/books', 'store');
    Route::get('/books/{id}', 'show');
    Route::put('/books/{id}', 'update');
    Route::delete('/books/{id}', 'destroy');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index');
    Route::post('/authors', 'store');
    Route::get('/authors/{id}', 'show');
    Route::put('/authors/{id}', 'update');
    Route::delete('/authors/{id}', 'destroy');
});


Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'index');
    Route::post('/reviews', 'store');
    Route::get('/reviews/{id}', 'show');
    Route::put('/reviews/{id}', 'update');
    Route::delete('/reviews/{id}', 'destroy');
});

Route::controller(BookGenreController::class)->group(function () {
    Route::post('/books/{bookId}/genres', 'attach');
    Route::delete('/books/{bookId}/genres/{genreId}', 'destroy');
});

Route::controller(ReviewUsuaryController::class)->group(function () {
    Route::get('/user-reviews', 'index');
    Route::post('/user-reviews', 'store');
    Route::get('/user-reviews/{id}', 'show');
    Route::put('/user-reviews/{id}', 'update');
    Route::delete('/user-reviews/{id}', 'destroy');
});
