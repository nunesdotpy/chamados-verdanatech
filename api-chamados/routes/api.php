<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChamadosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('refresh', [AuthController::class, 'refresh']);

        Route::post('chamado', [ChamadosController::class, 'store']);
        Route::get('chamado', [ChamadosController::class,'list']);
        Route::get('chamado/show/{id}', [ChamadosController::class, 'show']);
        Route::put('chamado/{id}', [ChamadosController::class, 'update']);
        Route::delete('chamado/{id}', [ChamadosController::class, 'destroy']);
    });
});