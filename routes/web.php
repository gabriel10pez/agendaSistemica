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
})->name('home');

Route::resource('tiposusuarios', TipoUsuarioController::class)->names([
    'index' => 'tiposusuarios.index',
    'create' => 'tiposusuarios.create',
    'store' => 'tiposusuarios.store',
    'show' => 'tiposusuarios.show',
    'edit' => 'tiposusuarios.edit',
    'update' => 'tiposusuarios.update',
    'destroy' => 'tiposusuarios.destroy',
]);

Route::resource('incidencias', IncidenciaController::class)->names([
    'index' => 'incidencias.index',
    'create' => 'incidencias.create',
    'store' => 'incidencias.store',
    'show' => 'incidencias.show',
    'edit' => 'incidencias.edit',
    'update' => 'incidencias.update',
    'destroy' => 'incidencias.destroy',
]);

Route::resource('asistentes', AsistenteController::class)->names([
    'index' => 'asistentes.index',
    'create' => 'asistentes.create',
    'store' => 'asistentes.store',
    'show' => 'asistentes.show',
    'edit' => 'asistentes.edit',
    'update' => 'asistentes.update',
    'destroy' => 'asistentes.destroy',
]);

Route::resource('tiposeventos', TipoEventoController::class)->names([
    'index' => 'tiposeventos.index',
    'create' => 'tiposeventos.create',
    'store' => 'tiposeventos.store',
    'show' => 'tiposeventos.show',
    'edit' => 'tiposeventos.edit',
    'update' => 'tiposeventos.update',
    'destroy' => 'tiposeventos.destroy',
]);

Route::resource('acta', ActaController::class)->names([
    'index' => 'acta.index',
    'create' => 'acta.create',
    'store' => 'acta.store',
    'show' => 'acta.show',
    'edit' => 'acta.edit',
    'update' => 'acta.update',
    'destroy' => 'acta.destroy',
]);

Route::resource('memorandum', MemorandumController::class)->names([
    'index' => 'memorandum.index',
    'create' => 'memorandum.create',
    'store' => 'memorandum.store',
    'show' => 'memorandum.show',
    'edit' => 'memorandum.edit',
    'update' => 'memorandum.update',
    'destroy' => 'memorandum.destroy',
]);

Route::resource('evento', EventController::class)->names([
    'index' => 'evento.index',
    'create' => 'evento.create',
    'store' => 'evento.store',
    'show' => 'evento.show',
    'edit' => 'evento.edit',
    'update' => 'evento.update',
    'destroy' => 'evento.destroy',
]);
// rama populate
//! pop rama
//LordAndre
// gabriel
