<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');

    Route::fallback(function () {
        return redirect('/welcome'); // Redirecione para onde for adequado
    });
});