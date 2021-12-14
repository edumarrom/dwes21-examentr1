<?php

use App\Http\Controllers\AeropuertosController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CriteriosController;
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
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rutas de ejemplo
|--------------------------------------------------------------------------
| Aquí están todas las rutas necesarias para controlar la tabla "depart".
| El orden de las rutas es importante (Programación defensiva). Por el
| momento ordenaré las rutas por aparición en su acrónimo CRUD:
| (CREATE, READ, UPDATE, DELETE)
|
*/

/* Create */
Route::get('/depart/create', [DepartControllerController::class, 'create']);
Route::post('/depart', [DepartController::class, 'store'])
    ->name('depart.store');

/* Read */
Route::get('/depart', [DepartController::class, 'index']);

/* Update */
Route::get('/depart/{id}/edit', [DepartController::class, 'edit']);
Route::put('/depart/{id}', [DepartController::class, 'update'])
    ->name('depart.update');

/* Delete */
Route::delete('/depart/{id}', [DepartController::class, 'destroy']);

/*
|---------------------------
| Aeropuertos
|---------------------------
|
*/
Route::get('/aeropuertos', [
    AeropuertosController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Rutas de Alumnos
|--------------------------------------------------------------------------
| Aquí están todas las rutas necesarias para controlar la tabla "alumnos".
|
*/

/* Create */
Route::get('/alumnos/create', [
    AlumnosController::class, 'create'
]);

Route::post('/alumnos', [
    AlumnosController::class, 'store'])
    ->name('alumnos.store')
;

/* Read */
Route::get('/alumnos', [
    AlumnosController::class, 'index'
]);

/* Update */
Route::get('/alumnos/{id}/edit', [
    AlumnosController::class, 'edit'
]);

Route::put('/alumnos/{id}', [
    AlumnosController::class, 'update'])
    ->name('alumnos.update')
;

/* Delete */
Route::delete('/alumnos/{id}', [
    AlumnosController::class, 'destroy'
]);

/*
|--------------------------------------------------------------------------
| Rutas de Alumnos
|--------------------------------------------------------------------------
| Aquí están todas las rutas necesarias para controlar la tabla "alumnos".
|
*/

/* Read */
Route::get('/criterios', [
    CriteriosController::class, 'index'
]);

/* Criterios */
Route::get('/alumnos/criterios/{id}', [
    AlumnosController::class, 'criterios'
]);
