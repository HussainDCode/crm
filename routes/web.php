<?php

use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
// Product routes Below    */
Route::get('/products', [ProductController::class, 'index'])->name('products.product');
Route::post('/products/store', [ProductController::class, 'storeProduct'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'updateProduct'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroyProduct'])->name('products.destroy');


// User routes Below:
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/companies', [CompaniesController::class, 'index'])->name('companies.index');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

