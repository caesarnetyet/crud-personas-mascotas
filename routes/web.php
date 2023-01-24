<?php

use App\Http\Controllers\FullStack\MascotasController;
use App\Http\Controllers\FullStack\PersonasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vue\VuePersonaController;
use Faker\Provider\Person;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [PersonasController::class,'index'])->name('/');

Route::prefix('/cliente')->group(function(){
    Route::get('/agregar', function (){
        return view('person.form');
    })->name('/cliente/agregar');
    Route::post('/agregar', [PersonasController::class,'create'])->name('personas.create');
    Route::get('/modificar/{persona_id}', [PersonasController::class,'update_view'])->name('personas.edit');
    Route::put('/modificar/{persona_id}', [PersonasController::class,'update'])->name('personas.update');
    Route::get('/eliminar/{persona_id}', [PersonasController::class,'delete'])->name('personas.delete');
});

Route::prefix('/mascota')->group(function () {
    Route::get('/ver/{persona_id}', [MascotasController::class,'mostrar'])->name('pets.show');
    Route::get('/borrar/{mascota_id}', [MascotasController::class,'delete'])->name('pets.delete');
    Route::get('/modificar/{mascota_id}', [MascotasController::class,'update_view'])->name('pets.edit');
    Route::post('/modificar/{mascota_id}', [MascotasController::class,'update'])->name('pets.update');
    Route::get('/agregar', [MascotasController::class, 'index'])->name('index');
    Route::post('/agregar', [MascotasController::class, 'create'])->name('create');
});


Route::prefix('/vue')->group(function(){
    Route::get('/',[VuePersonaController::class,'index'])->name('vue');
    Route::prefix('/persona')->group(function () {
        Route::get('/agregar', [VuePersonaController::class,'create'])->name('vue.persona.create');
        Route::post('/agregar', [VuePersonaController::class,'store'])->name('vue.persona.store');
        Route::get('/modificar/{persona}', [VuePersonaController::class,'edit'])->name('vue.persona.edit');
        Route::put('/modificar/{persona}', [VuePersonaController::class,'update'])->name('vue.persona.update');
        Route::get('/eliminar/{persona}', [VuePersonaController::class,'delete'])->name('vue.persona.delete');
    });
});
