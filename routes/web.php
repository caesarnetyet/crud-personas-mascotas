<?php

use App\Http\Controllers\FullStack\MascotasController;
use App\Http\Controllers\FullStack\PersonasController;
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

Route::get('/', [PersonasController::class, 'index'])->name('/');

Route::prefix('/cliente')->group(function(){
    Route::get('/agregar', function () {
        return view('person.form');
    })->name('/cliente/agregar');
    Route::post('/agregar', [PersonasController::class, 'create']);
});

Route::prefix('/mascota')->group(function(){
    Route::get('/agregar', [MascotasController::class, 'index'])->name('/mascota/agregar');
    Route::post('/agregar', [MascotasController::class, 'create']);
});