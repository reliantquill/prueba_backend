<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FormController;

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

Route::post('user_login', [UserController::class,'logeo']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('form_productos', [FormController::class,'productos']);

    Route::resource('pedidos', PedidoController::class);
    Route::get('pedidos_fecha/{fecha}', [PedidoController::class,'por_fechas']);

    Route::resource('productos', ProductoController::class);
});
