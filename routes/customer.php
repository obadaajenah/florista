<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\Auth\LoginController;
use App\Http\Controllers\Customer\Auth\RegisterController;




Route::post('register',[RegisterController::class,'register']);
Route::post('login',[LoginController::class,'login']);



Route::middleware('auth:user')->group(function(){
   Route::post('logout',[LoginController::class,'logout'])->middleware('auth:user');
});
