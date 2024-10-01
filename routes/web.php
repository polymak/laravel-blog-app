<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

// Resource routes for articles and categories
Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);

// Home route to display recent articles
Route::get('/', [ArticleController::class, 'home'])->name('home');

// Route for listing all articles
Route::get('/articles', [ArticleController::class, 'liste_article'])->name('articles.liste');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

