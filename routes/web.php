<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paneles\PanelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
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
//     return view('welcome');obtener_datos_contenedor_graficos
// });
// ----------- LOGIN  -------------------
Route::get('/', [LoginController::class, 'login' ])->name('/');
Route::post('/validar_usuario', [LoginController::class, 'validarUsuario' ])->name('validar.usuario');
Route::post('/cerrar_sesion', [LoginController::class, 'cerrarSesion' ])->name('cerrar.sesion');

//------------- PANEL BOARD ---------------
Route::get('/board', [PanelController::class, 'board'])->name('paneles.board');
Route::post('/obtener_contendor', [PanelController::class, 'obtenerContendor' ])->name('contenedores.obtener_contendor');
Route::post('/obtener_datos_contenedor', [PanelController::class, 'obtener_datos_contenedor' ])->name('contenedores.get_datos');
Route::post('/obtener_datos_contenedor_graficos', [PanelController::class, 'obtener_datos_contenedor_graficos' ])->name('contenedores.get_datos_graficos');
Route::post('/obtener_datos_contenedor/fecha', [PanelController::class, 'obtener_datos_contenedor_fecha' ])->name('contenedores.get_datos.fecha');
Route::post('/resumen_contenedores', [PanelController::class, 'resumen_contenedores' ])->name('contenedores.resumen');
Route::post('/get_alarma_evento', [PanelController::class, 'get_alarma_evento' ])->name('contenedores.get_alarma_evento');
Route::post('/get_lat_log', [PanelController::class, 'obtenerLatLong' ])->name('contenedores.get_lat_log');
Route::post('/datos_contenedor_mapa', [PanelController::class, 'datos_contenedor_mapa' ])->name('contenedores.datos_contenedor_mapa');

Route::post('/datos_contenedor', [PanelController::class, 'datos_contenedor' ])->name('contenedores.datos_contenedor');

//--------------------- SETTING ------------------------
Route::get('/setting', [SettingController::class, 'verSetting'])->name('setting');
Route::post('/usuario/nuevo', [SettingController::class, 'nuevoUsuario'])->name('nuevo_usuario');
Route::post('/usuario/borrar', [SettingController::class, 'borrarUsuario'])->name('borrar_usuario');
Route::post('/empresa/nueva', [SettingController::class, 'nuevaEmpresa'])->name('nueva_empresa');
Route::post('/contenedor/nuevo', [SettingController::class, 'nuevoContenedor'])->name('nuevo_contenedor');
Route::post('/contenedor/actualizar', [SettingController::class, 'cambiarEstadoContenedor'])->name('cambiar_estado_contenedor');
Route::post('/asignarContenedor', [SettingController::class, 'asignarContenedor'])->name('asignar_contenedor');
Route::post('/asignarContenedor', [SettingController::class, 'asignarContenedor'])->name('asignar_contenedor');
Route::post('/empresa/obtener_usuario', [SettingController::class, 'obtener_usuario_empresa'])->name('obtener_usuario_empresa');
Route::post('/empresa/asignar_usuario', [SettingController::class, 'asignar_usuario_empresa'])->name('asignar_usuario_empresa');
Route::post('/empresa/filtrar_contenedor', [SettingController::class, 'filtrar_contenedoresXempresas'])->name('filtrar_contenedoresXempresas');

Route::get('/faker', [PanelController::class, 'faker_datos'])->name('paneles.faker');

/* POINTS MADURADOR BIDIRECCIONAL */
Route::post('/madurador/points/get', [PanelController::class, 'get_points_madurador'])->name('madurador.points.get');
Route::post('/madurador/points/set', [PanelController::class, 'set_points_madurador'])->name('madurador.points.set');


