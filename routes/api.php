<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::post('register',[AuthController::class,'register']);
//Route::post('login',[AuthController::class,'login']);

// use group 
Route::controller(AuthController::class)->group(function(){
    Route::post('register','register');
    Route::post('login','login');
    Route::get('user','userProfile')->middleware('auth:sanctum');
    Route::post('logout','userLogout')->middleware('auth:sanctum');
});