<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
