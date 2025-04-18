<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/orders', [OrderController::class,'index']);
Route::post('/create/order', [OrderController::class, 'store']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::put('/update/order/{id}', [OrderController::class, 'update']);
Route::delete('/delete/order/{id}', [OrderController::class, 'destroy']);

Route::get('/categories', [CategoryController::class,'index']);
Route::post('/create/category', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::put('/update/category/{id}', [CategoryController::class, 'update']);
Route::delete('/delete/category/{id}', [CategoryController::class, 'destroy']);

Route::get('/menus', [MenuController::class,'index']);
Route::post('/create/menu', [MenuController::class, 'store']);
Route::get('/menu/{id}', [MenuController::class, 'show']);
Route::put('/update/menu/{id}', [MenuController::class, 'update']);
Route::delete('/delete/menu/{id}', [MenuController::class, 'destroy']);

