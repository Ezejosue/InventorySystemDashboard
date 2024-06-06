<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SaleController;

Route::middleware(['api'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::get('/users', [UserController::class, 'getAll'])->middleware('auth:sanctum');
    Route::post('/users', [UserController::class, 'create'])->middleware('auth:sanctum');
    Route::get('/users/{email}', [UserController::class, 'getByEmail'])->middleware('auth:sanctum');
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->middleware('auth:sanctum');

    Route::get('/categories', [CategoriesController::class, 'index'])->middleware('auth:sanctum');
    Route::post('/categories', [CategoriesController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/categories/{id}', [CategoriesController::class, 'show'])->middleware('auth:sanctum');
    Route::put('/categories/{id}', [CategoriesController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->middleware('auth:sanctum');

    Route::get('/suppliers', [SuppliersController::class, 'index'])->middleware('auth:sanctum');
    Route::post('/suppliers', [SuppliersController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/suppliers/{id}', [SuppliersController::class, 'show'])->middleware('auth:sanctum');
    Route::put('/suppliers/{id}', [SuppliersController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/suppliers/{id}', [SuppliersController::class, 'destroy'])->middleware('auth:sanctum');

    Route::get('/products', [ProductController::class, 'getAll'])->middleware('auth:sanctum');
    Route::post('/products', [ProductController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/products/{productName}', [ProductController::class, 'getProductByName'])->middleware('auth:sanctum');
    Route::put('/products', [ProductController::class, 'updateStock'])->middleware('auth:sanctum');
    Route::put('/products/{id}', [ProductController::class, 'updateProduct'])->middleware('auth:sanctum');

    Route::get('/clients', [ClientController::class, 'getAllClients'])->middleware('auth:sanctum');
    Route::post('/clients', [ClientController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/clients/{username}', [ClientController::class, 'getClientByUsername'])->middleware('auth:sanctum');
    Route::put('/clients/{id}', [ClientController::class, 'updateClient'])->middleware('auth:sanctum');

    Route::get('/sales', [SaleController::class, 'getAllSales'])->middleware('auth:sanctum');
    Route::post('/sales', [SaleController::class, 'registerSale'])->middleware('auth:sanctum');
    Route::get('/sales/{id}', [SaleController::class, 'getSaleById'])->middleware('auth:sanctum');
    Route::put('/sales/{id}', [SaleController::class, 'updateSale'])->middleware('auth:sanctum');
    Route::delete('/sales/{id}', [SaleController::class, 'deleteSale'])->middleware('auth:sanctum');
});
