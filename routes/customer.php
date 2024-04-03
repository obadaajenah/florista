<?php

use App\Http\Controllers\Api\Customer\Auth\LoginController;
use App\Http\Controllers\Api\Customer\Auth\RegisterController;
use Illuminate\Support\Facades\Route;




Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);


Route::middleware('auth:user')->group(function () {
   Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:user');
});
