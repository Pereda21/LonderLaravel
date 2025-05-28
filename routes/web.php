<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\AgendaController;

///////////////////// Rutas de la aplicación ////////////////////////

Route::get('/', function () {
    return redirect()->route('catalogo');
});
// Ruta para el catálogo de imágenes
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');

// Rutas para insertar registros en la agenda
Route::get('/insertar', [AgendaController::class, 'create'])->name('agenda.create');
Route::post('/insertar', [AgendaController::class, 'store'])->name('agenda.store');

Route::get('/mostrar', [AgendaController::class, 'mostrar'])->name('agenda.mostrar');

