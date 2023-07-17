<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\MemorandumController;
use App\Models\Memorandum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/evento', [EventoController::class, 'index']);
    Route::get('/evento/mostrar', [EventoController::class, 'show']);
    Route::post('/evento/agregar', [EventoController::class, 'store']);
    Route::post('/evento/editar/{id}', [EventoController::class, 'edit']);
    Route::post('/evento/actualizar/{evento}', [EventoController::class, 'update']);
    Route::post('/evento/borrar/{id}', [EventoController::class, 'destroy']);
});

Route::get('/memoranda', [MemorandumController::class, 'index'])->name('memoranda');
Route::get('/memoranda/reportPDF', [MemorandumController::class, 'report'])->name('memoranda-report');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/controleventos', [EventoController::class, 'control_eventos'])->name('control_eventos');
