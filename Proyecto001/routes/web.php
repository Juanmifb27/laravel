<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', homeController::class)->name('inicio');

Route::get('cursos', [CursoController::class, 'index'])->name('cursos');
Route::get('cursos/create', [CursoController::class, 'create'])->name('crearCurso');
Route::get('cursos/{curso}', [CursoController::class, 'show'])->name("mostrarCurso");