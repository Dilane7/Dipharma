<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');



Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/welcomeAdmin', function () {
        return view('welcomeAdmin');
    })->name('welcomeAdmin');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('auth')->prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategorieController::class, 'index'])->name('index');
    Route::post('/', [CategorieController::class, 'store'])->name('store');
    Route::get('/{categorie}/edit', [CategorieController::class, 'edit'])->name('edit');
    Route::put('/{categorie}', [CategorieController::class, 'update'])->name('update');
    Route::delete('/{categorie}', [CategorieController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
});


Route::middleware('auth')->prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'adminIndex'])->name('index');
    Route::get('/create', [UserController::class, 'adminCreate'])->name('create');
    Route::post('/', [UserController::class, 'adminStore'])->name('store');
    Route::get('/{user}', [UserController::class, 'adminShow'])->name('show');
    Route::get('/{user}/edit', [UserController::class, 'adminEdit'])->name('edit');
    Route::put('/{user}', [UserController::class, 'adminUpdate'])->name('update');
    Route::delete('/{user}', [UserController::class, 'adminDestroy'])->name('destroy');
});
