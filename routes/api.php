<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/user/getall', [UserController::class,'getAllUsers']);

Route::get('/user/getuser/{id}', [UserController::class,'getUser']);

Route::post('/user/insert', [UserController::class, 'insertUsers']);

Route::put('/user/update', [UserController::class,'getUser']);

Route::delete('/user/delete', [UserController::class,'getUser']);

