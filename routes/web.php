<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckSession;
use App\Http\Controllers\ArticleController;

Route::withoutMiddleware([CheckSession::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('article.show');
});

Route::middleware([CheckSession::class])->group(function () {
    Route::get('/article/create', function () {
        return view('create-article');
    })->name('createArticle');

    Route::get('/article/edit/{id}', [ArticleController::class, 'editPage'])->name('edit-article');

    Route::post('/article', [ArticleController::class, 'create'])->name('article.create');
    Route::put('/article/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::delete('/article/{id}', [ArticleController::class, 'delete'])->name('article.delete');
});
