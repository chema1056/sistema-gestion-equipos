<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('equipos', EquipoController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('asignaciones', AsignacionController::class);