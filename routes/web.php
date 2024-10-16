<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\CategoriaActivoController;
use App\Http\Controllers\HistoricoMovimientoController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UsuarioController;



Route::get('/home', function () { return view('home');
})->middleware('auth');


Route::get('/activos/show', [ActivoController::class, 'index']);

Route::get('/activos/create', [ActivoController::class, 'create']); 

Route::get('/activos/update/{activo}', [ActivoController::class, 'edit']); 

Route::post('/activos/store', [ActivoController::class, 'store']); 

Route::put('/activos/update/{activo}', [ActivoController::class, 'update']); 

Route::delete('/activos/destroy/{id}', [ActivoController::class, 'destroy']);



Route::get('/usuarios/show', [UsuarioController::class, 'index']);

Route::get('/usuarios/create', [UsuarioController::class, 'create']); 

Route::get('/usuarios/update/{usuario}', [UsuarioController::class, 'edit']); 

Route::post('/usuarios/store', [UsuarioController::class, 'store']); 

Route::put('/usuarios/update/{usuario}', [UsuarioController::class, 'update']); 

Route::delete('/usuarios/destroy/{id}', [UsuarioController::class, 'destroy']);


Route::get('/mantenimiento/show', [MantenimientoController::class, 'index']);

Route::get('/mantenimiento/create', [MantenimientoController::class, 'create']); 

Route::get('/mantenimiento/update/{mantenimiento}', [MantenimientoController::class, 'edit']); 

Route::post('/mantenimiento/store', [MantenimientoController::class, 'store']); 

Route::put('/mantenimiento/update/{mantenimiento}', [MantenimientoController::class, 'update']); 

Route::delete('/mantenimiento/destroy/{id}', [MantenimientoController::class, 'destroy']);



Route::get('/historial_movimiento/show', [HistoricoMovimientoController::class, 'index']);

Route::get('/historial_movimiento/create', [HistoricoMovimientoController::class, 'create']); 

Route::get('/historial_movimiento/update/{historial_movimiento}', [HistoricoMovimientoController::class, 'edit']); 

Route::post('/historial_movimiento/store', [HistoricoMovimientoController::class, 'store']); 

Route::put('/historial_movimiento/update/{historial_movimiento}', [HistoricoMovimientoController::class, 'update']); 

Route::delete('/historial_movimiento/destroy/{id}', [HistoricoMovimientoController::class, 'destroy']);




Route::get('/categorias_activos/show', [CategoriaActivoController::class, 'index']);

Route::get('/categorias_activos/create', [CategoriaActivoController::class, 'create']); 

Route::get('/categorias_activos/update/{categorias_activos}', [CategoriaActivoController::class, 'edit']); 

Route::post('/categorias_activos/store', [CategoriaActivoController::class, 'store']); 

Route::put('/categorias_activos/update/{categorias_activos}', [CategoriaActivoController::class, 'update']); 

Route::delete('/categorias_activos/destroy/{id}', [CategoriaActivoController::class, 'destroy']);



Route::get('/ubicaciones/show', [UbicacionController::class, 'index']);

Route::get('/ubicaciones/create', [UbicacionController::class, 'create']); 

Route::get('/ubicaciones/update/{ubicaciones}', [UbicacionController::class, 'edit']); 

Route::post('/ubicaciones/store', [UbicacionController::class, 'store']); 

Route::put('/ubicaciones/update/{ubicaciones}', [UbicacionController::class, 'update']); 

Route::delete('/ubicaciones/destroy/{id}', [UbicacionController::class, 'destroy']);


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
