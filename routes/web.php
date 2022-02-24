<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paneles\PanelController;
use App\Http\Controllers\LoginController;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// ----------- LOGIN  -------------------
Route::get('/', [LoginController::class, 'login' ])->name('/');
Route::post('/validar_usuario', [LoginController::class, 'validarUsuario' ])->name('validar.usuario');
Route::post('/cerrar_sesion', [LoginController::class, 'cerrarSesion' ])->name('cerrar.sesion');
Route::get('/board', [PanelController::class, 'board'])->name('paneles.board');
Route::post('/obtener_datos_contenedor', [PanelController::class, 'obtener_datos_contenedor' ])->name('contenedores.get_datos');
Route::post('/get_alarma_evento', [PanelController::class, 'get_alarma_evento' ])->name('contenedores.get_alarma_evento');

Route::get('/faker', [PanelController::class, 'faker_datos'])->name('paneles.faker');
