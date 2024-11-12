<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\CategoriaActivoController;
use App\Http\Controllers\HistoricoMovimientoController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReportController;



Route::get('/home', function () { return view('home');
})->middleware('auth');


Route::get('/activos/show', [ActivoController::class, 'index']);

Route::get('/activos/create', [ActivoController::class, 'create']); 

Route::get('/activos/edit/{activos}', [ActivoController::class, 'edit']); 

Route::post('/activos/store', [ActivoController::class, 'store']); 

Route::get('/activos', [ActivoController::class, 'index'])->name('activos.index');

Route::put('/activos/update/{activos}', [ActivoController::class, 'update']); 

Route::delete('/activos/destroy/{id}', [ActivoController::class, 'destroy']);



Route::get('/usuarios/show', [UsuarioController::class, 'index']);

Route::get('/usuarios/create', [UsuarioController::class, 'create']); 

Route::get('/usuarios/edit/{usuario}', [UsuarioController::class, 'edit']); 

Route::post('/usuarios/store', [UsuarioController::class, 'store']); 

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

Route::put('/usuarios/update/{usuario}', [UsuarioController::class, 'update']); 

Route::delete('/usuarios/destroy/{id}', [UsuarioController::class, 'destroy']);


Route::get('/mantenimiento/show', [MantenimientoController::class, 'index']);

Route::get('/mantenimiento/create', [MantenimientoController::class, 'create']); 

Route::get('/mantenimiento/edit/{mantenimientos}', [MantenimientoController::class, 'edit']); 

Route::post('/mantenimiento/store', [MantenimientoController::class, 'store']); 

Route::get('/mantenimiento', [MantenimientoController::class, 'index'])->name('mantenimiento.index');

Route::put('/mantenimiento/update/{mantenimientos}', [MantenimientoController::class, 'update']); 

Route::delete('/mantenimiento/destroy/{id}', [MantenimientoController::class, 'destroy']);



Route::get('/historial_movimiento/show', [HistoricoMovimientoController::class, 'index']);

Route::get('/historial_movimiento/create', [HistoricoMovimientoController::class, 'create']); 

Route::get('/historial_movimiento/edit/{movimientos}', [HistoricoMovimientoController::class, 'edit']); 

Route::post('/historial_movimiento/store', [HistoricoMovimientoController::class, 'store']); 

Route::get('/historial_movimiento', [HistoricoMovimientoController::class, 'index'])->name('historial_movimiento.index');

Route::put('/historial_movimiento/update/{movimientos}', [HistoricoMovimientoController::class, 'update']); 

Route::delete('/historial_movimiento/destroy/{id}', [HistoricoMovimientoController::class, 'destroy']);




Route::get('/categorias_activos/show', [CategoriaActivoController::class, 'index']);

Route::get('/categorias_activos/create', [CategoriaActivoController::class, 'create']); 

Route::get('/categorias_activos/edit/{categoriasActivo}', [CategoriaActivoController::class, 'edit']); 

Route::post('/categorias_activos/store', [CategoriaActivoController::class, 'store']); 

Route::get('/categorias_activos', [CategoriaActivoController::class, 'index'])->name('categorias_activos.index');

Route::put('/categorias_activos/update/{categoriasActivo}', [CategoriaActivoController::class, 'update']); 

Route::delete('/categorias_activos/destroy/{id}', [CategoriaActivoController::class, 'destroy']);




// Mostrar todas las ubicaciones
Route::get('/ubicaciones/show', [UbicacionController::class, 'index']);
// Mostrar el formulario de creación de una nueva ubicación
Route::get('/ubicaciones/create', [UbicacionController::class, 'create']); 
// Mostrar el formulario para editar una ubicación existente
Route::get('/ubicaciones/update/{ubicacion}', [UbicacionController::class, 'edit'])->name('ubicaciones.edit');
// Almacenar la nueva ubicación
Route::post('/ubicaciones/store', [UbicacionController::class, 'store']); 
// Actualizar una ubicación existente
// Ruta para actualizar una ubicación existente
Route::put('/ubicaciones/update/{ubicacion}', [UbicacionController::class, 'update'])->name('ubicaciones.update');
Route::delete('/ubicaciones/destroy/{id}', [UbicacionController::class, 'destroy'])->name('ubicaciones.destroy');

//Rutas para reportes
Route::get('/reporte', [ReportController::class,'reporteUno',]);
Route::get('/reporteDos', [ReportController::class,'reporteDos',]);
Route::get('/reporteTres', [ReportController::class,'reporteTres',]);
Route::get('/reporteCuatro', [ReportController::class,'reporteCuatro',]);
Route::get('/reporteCinco', [ReportController::class,'reporteCinco',]);
Route::get('/reporteSeis', [ReportController::class,'reporteSeis',]);
Route::post('/reportes/activos', [ReporteController::class, 'generarReporteActivos']);
Route::post('/reportes/categorias', [ReporteController::class, 'generarReporteCategorias']);
Route::post('/reportes/historial', [ReporteController::class, 'generarReporteHistorial']);
Route::post('/report', [ReporteController::class, 'report']);
Route::get('/reports/formulario', function() {
    return view('reports.formulario');
});
// Ruta para generar el reporte de historial
Route::post('/reports/historial', [ReportController::class, 'generarReporteHistorial'])->name('reports.historial');

// Ruta para generar el reporte de activos
Route::post('/reportes/activos', [ReportController::class, 'generarReporteActivos']);

// Ruta para generar el reporte de categorías
Route::post('/reportes/categorias', [ReportController::class, 'generarReporteCategorias']);

// Ruta para generar el reporte de historial de movimientos
Route::post('/reportes/historial', [ReportController::class, 'generarReporteHistorial']);


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
