<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderControllerA;
use App\Http\Controllers\OrderControllerC;
use App\Http\Controllers\ProductLookupController;
use App\Http\Controllers\InvoiceController; // Ensure this line exists and the class is correctly defined in your project
use App\Http\Controllers\AdminDashboardController;// Ensure this controller exists in the specified namespace

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
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['auth'])->prefix('categories')->name('categories.')->group(function () {
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


Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});



// Groupe de routes pour les clients (nécessite l'authentification et le rôle 'client')
Route::middleware('auth')->group(function () {
    // Affichage des produits
    Route::get('/productsclient', [ProductController::class, 'indexClient'])->name('products.indexClient');

    // Gestion du panier
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/orders/history', [OrderControllerC::class, 'history'])->name('orders.history');
    Route::post('/orders/{order}/cancel', [OrderControllerC::class, 'cancel'])->name('orders.cancel');
    Route::get('/orders/{order}/commande', [OrderControllerC::class, 'show'])->name('orders.showClient');

    // Gestion des commandes
    Route::get('/checkout', [OrderControllerC::class, 'checkout'])->name('orders.checkout');
    Route::post('/orders/place', [OrderControllerC::class, 'placeOrder'])->name('orders.place');
    Route::get('/orders/thankyou', [OrderControllerC::class, 'thankyou'])->name('orders.thankyou');
});

// Groupe de routes pour l'administrateur (nécessite l'authentification et le rôle 'admin', préfixé par 'admin')
Route::middleware('auth')->group(function () {

    // Gestion des commandes
    Route::get('/orders/pending', [OrderControllerA::class, 'pendingOrders'])->name('orders.pending');
    Route::get('/orders/{order}/validate', [OrderControllerA::class, 'validateOrder'])->name('orders.validate');
    Route::get('/orders/{order}', [OrderControllerA::class, 'show'])->name('orders.show');
    Route::get('/orders_validated', [OrderControllerA::class, 'validatedOrders'])->name('orders.validatedOrders');

    // Vous pouvez ajouter ici d'autres routes pour la gestion des commandes (e.g., afficher le détail d'une commande, marquer comme expédiée, annulée, etc.)
    // Exemple pour afficher le détail d'une commande :
    // Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
});



Route::middleware('auth')->group(function () {
    // Dashboard or other admin routes
    // Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Invoice Routes
    Route::resource('invoices', InvoiceController::class);
    Route::get('orders/{order}/create-invoice', [InvoiceController::class, 'createFromOrder'])->name('invoices.createFromOrder');

    // Route for AJAX product lookup
    Route::get('products/lookup/{product}', [ProductLookupController::class, 'lookup'])->name('products.lookup');

    // Assuming you have Order routes, add a place to link invoice creation
    // Example within your order resource routes or list view
});
