<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paneles\PanelController;
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
Route::get('/', [PanelController::class, 'verPanel'])->name('paneles.ver_panel');
Route::get('/board', [PanelController::class, 'board'])->name('paneles.board');
