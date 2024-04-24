<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'user'], function () {
    Route::put('/update', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'delete']);
    Route::get('/get-all-user', [UserController::class, 'getAllUser']);
    Route::get('/info', [UserController::class, 'info']);
    Route::get('find-user/{id}', [UserController::class, 'findUser']);
});
