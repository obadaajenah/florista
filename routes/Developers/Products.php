<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('product')->controller(ProductController::class)->group(function(){

});

Route::post('add_review',[ReviewController::class,'store']);
Route::get('all',[ReviewController::class,'index']);