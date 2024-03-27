<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;




Route::post('register',[ProviderController::class,'register']);
Route::post('login',[ProviderController::class,'login']);
Route::post('logout',[ProviderController::class,'logout'])->middleware('check_user:pro-api');
