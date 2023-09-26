<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FruitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('api')->as('api.')->group(function() {
    // login 
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    // check token
    Route::middleware('auth:sanctum')->group(function () {
        // category
        Route::get('categories', [CategoryController::class, 'index']);
        Route::resource('category', CategoryController::class)->only(
            'show', 'store', 'update', 'destroy'
        );
        // fruit
        Route::get('category/{category}/fruits', [FruitController::class, 'index']);
        Route::resource('category/{category}/fruit', FruitController::class)->only(
            'show', 'store', 'update', 'destroy'
        );
        // logout
        Route::post('/logout', [AuthController::class, 'logout']);
    });
    
});
