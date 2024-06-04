<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuppliersController;

Route::middleware(['api'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/users', [UserController::class, 'getAll']);
    Route::post('/users', [UserController::class, 'create']);
    Route::get('/users/{email}', [UserController::class, 'getByEmail']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'delete']);

    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::post('/categories', [CategoriesController::class, 'store']);
    Route::get('/categories/{id}', [CategoriesController::class, 'show']);
    Route::put('/categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

    Route::get('/suppliers', [SuppliersController::class, 'index']);
    Route::post('/suppliers', [SuppliersController::class, 'store']);
    Route::get('/suppliers/{id}', [SuppliersController::class, 'show']);
    Route::put('/suppliers/{id}', [SuppliersController::class, 'update']);
    Route::delete('/suppliers/{id}', [SuppliersController::class, 'destroy']);

    Route::get('/products', [ProductController::class, 'getAll']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{productName}', [ProductController::class, 'getProductByName']);
    Route::put('/products', [ProductController::class, 'updateStock']);
});
