<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
// Authetication View
Route::get('/login',[AuthController::class,'viewLogin']);
Route::get('/register',[AuthController::class,'viewRegister']);
Route::get('/home', [AuthController::class, 'index'])->name('home');

// Product Route
Route::get('/product',[ProductController::class,'index'])->name('product.view');
Route::get('/product/store',[ProductController::class,'storeProduct'])->name('product.store');
Route::post('/product/create',[ProductController::class,'createProduct'])->name('product.create');
Route::put('/product/update/{id}',[ProductController::class,'updateProduct'])->name('product.update');
Route::delete('/product/delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');
