<?php

use App\Http\Controllers\{RegisterController, UserController, BookController, CategoryController, LoginController, LogoutController, SearchController};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::view("/", "home");

    Route::get('books/export-pdf', [BookController::class, 'exportPdf'])->name('books.export.pdf');
    Route::get('books/export-excel', [BookController::class, 'exportExcel'])->name('books.export.excel');
    Route::resource("books", BookController::class);

    Route::get('books-search', [SearchController::class, 'searchBook'])->name('search.book');
    Route::get('categories-search', [SearchController::class, 'searchCategory'])->name('search.category');

    Route::get("users/{user:username}", [UserController::class, 'show'])->name('users.show');
    Route::post('logout', LogoutController::class)->name('logout');

    Route::resource('categories', CategoryController::class);
    Route::get('categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});
