<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\TipoDocumentoController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('facturas', FacturaController::class);
    Route::get('/tipos_documentos', [TipoDocumentoController::class, 'index']);
    Route::get('/divisas', [DivisaController::class, 'index']);

    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
