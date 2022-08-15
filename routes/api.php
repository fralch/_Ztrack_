<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paneles\PanelController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contenedores', [PanelController::class, 'api_contendedores'])->name('api.contenedores');
Route::post('/madurador_point/get', [PanelController::class, 'api_get_madurador_points'])->name('api.madurador_point.get');
Route::post('/probando/conexion', [PanelController::class, 'ComprobarConexion'])->name('probar.conexion');
