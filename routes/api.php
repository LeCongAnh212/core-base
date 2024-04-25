<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('login-view', [UserController::class, 'loginView'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::put('/update', [UserController::class, 'update']);
        Route::delete('/delete/{id}', [UserController::class, 'delete']);
        Route::get('/get-all-user', [UserController::class, 'getAllUser']);
        Route::get('/info', [UserController::class, 'info']);
        Route::get('find-user/{id}', [UserController::class, 'findUser']);
        // Route::get('logout', [UserController::class, 'logout']);
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('check', [AdminController::class, 'check']);
    });

    Route::group(['prefix' => 'store', 'middleware' => 'store'], function () {
        Route::get('check', [StoreController::class, 'check']);
    });

    Route::group(['prefix' => 'staff', 'middleware' => 'staff'], function () {
        Route::get('check', [StaffController::class, 'check']);
    });
});

Route::get('error-forbidden', [UserController::class, 'errorForbidden'])->name('error-forbidden');
