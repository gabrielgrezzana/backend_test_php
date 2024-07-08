<?php

//Criar rota para salvar os MODELOS de documentos/receitas!

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\VotationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::prefix('user')->group(function () {
    Route::post('create',  [UserController::class, 'create']);
    Route::middleware('auth:api')->get('read',    [UserController::class, 'read']);
});

Route::prefix('restaurant')->group(function () {
    Route::get('read-all',  [RestaurantController::class, 'readAll']);
});

Route::prefix('votation')->group(function () {
    Route::post('create',  [VotationController::class, 'create']);
    Route::get('read-results',  [VotationController::class, 'readResults']);
});
