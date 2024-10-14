<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('activos/show', function () {
    return view('activos/show');
});
Route::get('activos/create', function () {
    return view('activos/create');
});
Route::get('activos/update', function () {
    return view('activos/update');
});

Route::get('usuarios/show', function () {
    return view('usuarios/show');
});
Route::get('usuarios/create', function () {
    return view('usuarios/create');
});
Route::get('usuarios/update', function () {
    return view('usuarios/update');
});


Route::get('mantenimiento/update', function () {
    return view('mantenimiento/update');
});
Route::get('mantenimiento/show', function () {
    return view('mantenimiento/show');
});
Route::get('mantenimiento/create', function () {
    return view('mantenimiento/create');
});



Route::get('historial_movimiento/show', function () {
    return view('historial_movimiento/show');
});



Route::get('categorias_activos/create', function () {
    return view('categorias_activos/create');
});
Route::get('categorias_activos/show', function () {
    return view('categorias_activos/show');
});
Route::get('categorias_activos/update', function () {
    return view('categorias_activos/update');
});


Route::get('ubicaciones/update', function () {
    return view('ubicaciones/update');
});
Route::get('ubicaciones/create', function () {
    return view('ubicaciones/create');
});
Route::get('ubicaciones/show', function () {
    return view('ubicaciones/show');
});