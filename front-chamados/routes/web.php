<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChamadosController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('auth.login');
})->name('home');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [ChamadosController::class, 'index'] )->name('dashboard');
    Route::get('chamado/create', [ChamadosController::class, 'novochamado'] )->name('chamado.create');
    Route::post('chamado/store', [ChamadosController::class, 'store'] )->name('chamado.store');
    Route::get('chamado/edit/{id}', [ChamadosController::class, 'edit'])->name('chamado.edit');
    Route::post('chamado/update/{id}', [ChamadosController::class, 'update'])->name('chamado.update');
    Route::get('chamado/destroy/{id}', [ChamadosController::class, 'destroy'])->name('chamado.destroy');
});
