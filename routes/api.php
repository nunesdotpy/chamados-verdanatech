<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChamadosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('api/*', function () {
    return response()->json([
        'message' => 'Página não encontrada'
    ], 404);
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);


    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('refresh', [AuthController::class, 'refresh']);

        Route::post('chamado', [ChamadosController::class, 'store']);
        Route::get('chamado', [ChamadosController::class,'list']);
        Route::get('chamado/show/{id}', [ChamadosController::class, 'show']);
        Route::put('chamado/{id}', [ChamadosController::class, 'update']);
    });
});