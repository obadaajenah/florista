<?php

use App\Http\Controllers\Provider\Auth\LoginController;
use App\Http\Controllers\Provider\Auth\RegisterController;
use App\Http\Controllers\Provider\Auth\RequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;




Route::post('register',[RegisterController::class,'register']);
Route::post('login',[LoginController::class,'login']);
Route::post('Request-join',[RequestController::class,'join']);


Route::middleware('auth:provider')->group(function(){
    Route::post('logout',[LoginController::class,'logout'])->middleware('auth:provider');
    Route::post('add_post', [ProviderController::class, 'store']);
    Route::get('all', [ProviderController::class, 'index']);
    Route::get('profile/{provider}', [ProviderController::class, 'myProfile']);
    Route::get('posts', [ProviderController::class, 'posts']);
    Route::put('update/{provider}', [ProviderController::class, 'updateProfile']);

});
