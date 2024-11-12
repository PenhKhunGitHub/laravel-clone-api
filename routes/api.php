<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Protect Route
Route::group(['middleware' => ['auth:api']], function () {
    // Route Posts
    Route::post('/create',[PostController::class,'store']);
    Route::post('/update/{id}',[PostController::class,'update']);
    Route::delete('/delete/{id}',[PostController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'login']);
});
Route::get('/getAll',[PostController::class,'index'])->name('api/getAll');
Route::post('/create-user', [AuthController::class, 'register'])->name('create-user');
Route::post('/login-user', [AuthController::class, 'login'])->name('login-user');

Route::get('/product/store',[ProductController::class,'storeProduct'])->name('product.store');
Route::post('/product/create',[ProductController::class,'createProduct'])->name('product.create');
Route::put('/product/update/{id}',[ProductController::class,'updateProduct'])->name('product.update');
Route::delete('/product/delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');

//Route Logout User
//Route::middleware('auth:api')->post('/logout',[AuthController::class,'logout']);
