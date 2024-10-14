{{-- Heradomos la estructura del archivo app.blade.app --}}
@extends('layout.app')

{{-- Definimos el título --}}
@section('title','Inicio')

{{-- Definimos el contenido --}}
@section('content')
<div class="container">
    <div class="jumbotron text-center">
        <h1>Sistema de Inventario de Activo Fijo</h1>
        <p>Administra eficientemente tus activos fijos, monitorea la depreciación y genera reportes detallados.</p>
        <a href="{{('activos/show') }}" class="btn btn-primary">Ver Activos</a>
    </div>
    <br>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestió de activos</h5>
                    <p class="card-text">Registra, actualiza y elimina activos de manera sencilla.</p>
                    <a href="{{('activos/show') }}" class="btn btn-success">Gestionar activos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Seguimiento de Depreciación</h5>
                    <p class="card-text">Monitorea la depreciación de los activos.</p>
                    <a href="{{('depreciation/show') }}" class="btn btn-info">Ver Depreciación</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Generar Informes</h5>
                    <p class="card-text">Genera reportes detallados.</p>
                    <a href="{{('reports') }}" class="btn btn-secondary">Generar Informe</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

@endsection