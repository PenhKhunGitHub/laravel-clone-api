<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Protect Route
Route::group(['middleware' => ['auth:api']], function () {
    // Route Posts
    Route::get('/getAll',[PostController::class,'index']);
    Route::post('/create',[PostController::class,'store']);
    Route::post('/update/{id}',[PostController::class,'update']);
    Route::delete('/delete/{id}',[PostController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'login']);
});
// Route::middleware('auth:api')->group(function(){
//     // Route Posts
//     Route::get('/getAll',[PostController::class,'index']);
//     Route::post('/create',[PostController::class,'store']);
//     Route::post('/update/{id}',[PostController::class,'update']);
//     Route::delete('/delete/{id}',[PostController::class,'destroy']);
// });

// Route Users
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//Route Logout User
//Route::middleware('auth:api')->post('/logout',[AuthController::class,'logout']);
