<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rout Post
Route::get('/getAll',[PostController::class,'index'])->middleware('auth:api');
Route::post('/create',[PostController::class,'store']);
Route::post('/update/{id}',[PostController::class,'update']);
Route::delete('/delete/{id}',[PostController::class,'destroy']);

// Route User 
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//Route Logout User
Route::middleware('auth:api')->post('/logout',[AuthController::class,'logout']);
