<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;




Route::post('register',[CustomerController::class,'register']);
Route::post('login',[CustomerController::class,'login']);
Route::post('logout',[CustomerController::class,'logout'])->middleware('check_user:user-api');
