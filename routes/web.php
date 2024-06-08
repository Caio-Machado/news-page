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

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
});

Route::middleware([CheckSession::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/article/create', function () {
        return view('create-article');
    })->name('create-article');

    Route::get('/article/edit/{id}', function () {
        return view('edit-article');
    })->name('edit-article');

    Route::post('/article', [ArticleController::class, 'create'])->name('article.create');
    Route::put('/article', [ArticleController::class, 'edit'])->name('article.edit');
    Route::delete('/article', [ArticleController::class, 'delete'])->name('article.delete');
});
