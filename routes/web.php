<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Models\Evento;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/',[EventoController::class, 'index'])->name('eventos');

//Rutas para gestionar el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Solo si eres admin y estás autenticado
Route::middleware(['auth', 'rol:admin'])->group(function () {

    Route::get('/dashboard', [EventoController::class, 'indexAdmin'])->name('dashboard');
    Route::get('/evento/{evento}/borrar', [EventoController::class, 'destroy']);
    Route::get('/evento/{evento}/detalle', [EventoController::class, 'detalle']);
    Route::get('/user/{user}/evento/{evento}/borrar', [EventoController::class, 'eliminarUserEvento']);

    //INSCRIBIR
    Route::get('/evento/{evento}/user/{user}/incribirme', [EventoController::class, 'addUserEvento']);
    Route::post('/evento/inscribir', [EventoController::class, 'inscribir']);

    //BUSCAR EVENTOS
    Route::post('/evento/buscarCiudad', [EventoController::class, 'buscarCiudad']);
    Route::post('/evento/buscarCategoria', [EventoController::class, 'buscarCategoria']);
    Route::post('/evento/buscarFecha', [EventoController::class, 'buscarFecha']);

    //CON ESTO LO MANDO AL FORM DE CREAR EVENTO
    Route::get('/evento/nuevo', [EventoController::class, 'create']);
    Route::post('/evento/store', [EventoController::class, 'store']);

    //MODIFICAR EVENTO
    Route::post('/evento/{evento}/modificar', [EventoController::class, 'update']);

});


//WEB
Route::middleware('auth')->group(function () {
    Route::get('/evento/{evento}/user/{user}/incribirme', [EventoController::class, 'addUserEvento']);
    Route::post('/evento/inscribir', [EventoController::class, 'inscribir']);
    Route::get('/evento/{evento}/detalleA', [EventoController::class, 'detalleAsistente']);
    Route::get('/user/{user}/evento/{evento}/borrarA', [EventoController::class, 'eliminarUserEvento']);

    //BUSCAR EVENTOS
    Route::post('/evento/buscarCiudad', [EventoController::class, 'buscarCiudad']);
    Route::post('/evento/buscarCategoria', [EventoController::class, 'buscarCategoria']);
    Route::post('/evento/buscarFecha', [EventoController::class, 'buscarFecha']);

});

require __DIR__.'/auth.php';
