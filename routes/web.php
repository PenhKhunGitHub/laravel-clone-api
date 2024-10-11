<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[AuthController::class,'viewLogin']);
Route::get('/register',[AuthController::class,'viewRegister']);
