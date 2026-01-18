<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockTransactionController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('warehouses', WarehouseController::class);
    Route::resource('items', ItemController::class);
    Route::resource('stocks', StockController::class)
        ->except(['show']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('stock-transactions', StockTransactionController::class)
        ->only(['index', 'create', 'store']);
});

require __DIR__ . '/auth.php';
