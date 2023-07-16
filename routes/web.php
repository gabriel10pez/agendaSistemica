<?php

use App\Http\Controllers\ActaController;
use App\Http\Controllers\AsistenteController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\MemorandumController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\TipoUsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('tiposusuarios', TipoUsuarioController::class);
Route::resource('incidencias', IncidenciaController::class);
Route::resource('asistentes', AsistenteController::class);
Route::resource('tiposeventos', TipoEventoController::class);
Route::resource('acta', ActaController::class);
Route::resource('memorandum', MemorandumController::class);
Route::resource('evento', EventController::class);
// rama populate
//! pop rama
//LordAndre
// gabriel
