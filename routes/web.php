<?php

use App\Http\Controllers\AsistenteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\MemorandumController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Incidencias;
use App\Models\Memorandum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//$tipo=Auth::user()->tipo_usuario_id;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/error', function () {
    return view('Errors.404');
})->name('acceso-no-autorizado');

Route::group(['middleware' => function (Request $request, $next) {
    // Verificar si el usuario ha iniciado sesión
    if (!auth()->check()) {
        return redirect()->route('login'); // Redirigir a la página de inicio de sesión
    }

    // Obtener el tipo de usuario del campo "tipo_usuario_id"
    $tipoUsuarioId = auth()->user()->tipo_usuario_id;

    // Verificar si el tipo de usuario es igual a 1
    if ($tipoUsuarioId == 1) {
        return $next($request); // Permitir el acceso al siguiente middleware o controlador
    }

    // En caso de no cumplir con el tipo de usuario requerido, redirigir a una página de acceso no autorizado u otra acción que desees.
    return redirect()->route('acceso-no-autorizado');
}], function () {
    // Aquí van tus rutas que requieren que el usuario haya iniciado sesión y cumpla con el campo "tipo_usuario_id" igual a 1.

    Route::get('/memoranda', [MemorandumController::class, 'index'])->name('memoranda');
    Route::get('/oficios', [MemorandumController::class, 'oficios'])->name('oficios');
    Route::get('/memoranda/reportPDF/{id}', [MemorandumController::class, 'report'])->name('memoranda-report');
    Route::get('/controleventos', [EventoController::class, 'control_eventos'])->name('control_eventos');
    Route::get('/controleventos/{evento}/acta', [EventoController::class, 'control_evento_acta'])->name('control_evento_acta');
    Route::post('/controleventos/{evento}/acta/guardar', [EventoController::class, 'control_evento_acta_guardar'])->name('control_evento_acta_guardar');

    Route::get('/actas', [EventoController::class, 'actas'])->name('actas');
    Route::get('/actas/{acta}/pdf', [EventoController::class, 'acta_pdf'])->name('acta_pdf');

    // REPORTES DE ASISTENCIAS
    Route::get('/reporte/{user}', [AsistenteController::class, 'reportes_pdf'])->name('reportes_pdf');
});

Route::resource('incidencias', IncidenciaController::class);
// Route::get('/incidencias', [IncidenciaController::class,'index'])->name('incidencias');
// Route::get('/incidencias/crear', [IncidenciaController::class,'create'])->name('crear_incidencia');
// Route::post('/incidencias/', [IncidenciaController::class, 'store'])->name('incidencias.store');

Route::resource('user',UserController::class);
Route::put('updatePass/{user}',[UserController::class,'updatePass'])->name('updatePass');
// Route::get('/dsadsa', Incidencias::class);
