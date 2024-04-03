<?php


use App\Http\Controllers\Api\Provider\Auth\LoginController;
use App\Http\Controllers\Api\Provider\Auth\RegisterController;
use App\Http\Controllers\Api\Provider\Auth\RequestController;
use App\Http\Controllers\Api\Provider\ProviderController;
use Illuminate\Support\Facades\Route;




Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('request-join', [RequestController::class, 'join']);


Route::middleware('auth:provider')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:provider');
    Route::post('add-post', [ProviderController::class, 'store']);
    Route::get('all', [ProviderController::class, 'index']);
    Route::get('profile/{provider}', [ProviderController::class, 'myProfile']);
    Route::get('posts', [ProviderController::class, 'posts']);
    Route::put('update/{provider}', [ProviderController::class, 'updateProfile']);
    Route::get('show/{provider}', [ProviderController::class, 'show']);
});
