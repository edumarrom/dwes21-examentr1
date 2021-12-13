<?php

use App\Http\Controllers\AeropuertosController;
use App\Http\Controllers\DepartController;
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
