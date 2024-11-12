{{-- Heradomos la estructura del archivo app.blade.app --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title','Inicio')

{{-- Definimos el contenido --}}
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container my-5">
    <!-- Jumbotron principal -->
    <div class="jumbotron text-center bg-primary text-white p-4 rounded shadow">
        <h1 class="display-4">Sistema de Inventario de Activo Fijo</h1>
        <p class="lead">Administra eficientemente tus activos fijos, monitorea la depreciación y genera reportes detallados.</p>
        <a href="{{ url('activos/show') }}" class="btn btn-light btn-lg mt-3">Ver Activos</a>
    </div>

    <!-- Sección de Información de la Empresa -->
    <div class="bg-light p-4 my-4 rounded shadow">
        <h2 class="text-center mb-4">Información General</h2>
        <p><strong>Nombre de la Empresa:</strong> Organización financiera</p>
        <p><strong>Dirección:</strong> Santiago Nonualco</p>
        <p><strong>Teléfono:</strong> 62016283</p>
        <p><strong>Email:</strong> jose.roque23@itca.edi.sv</p>
        <p><strong>Descripción:</strong> Empresa dedicada a la gestión de activos fijos con un enfoque en eficiencia y control de depreciación, brindando herramientas para mantener y optimizar los recursos.</p>
    </div>

    <!-- Sección de Tarjetas mejorada -->
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card shadow mb-4 border-0 rounded">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-box-open fa-3x text-primary"></i>
                    </div>
                    <h5 class="card-title">Gestión de Activos</h5>
                    <p class="card-text">Registra, actualiza y elimina activos de manera sencilla.</p>
                    <a href="{{ url('activos/show') }}" class="btn btn-primary btn-block">Gestionar activos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4 border-0 rounded">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-chart-line fa-3x text-info"></i>
                    </div>
                    <h5 class="card-title">Seguimiento de Depreciación</h5>
                    <p class="card-text">Monitorea la depreciación de los activos.</p>
                    <a href="{{ url('activos/show') }}" class="btn btn-info btn-block">Ver Depreciación</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4 border-0 rounded">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-file-alt fa-3x text-secondary"></i>
                    </div>
                    <h5 class="card-title">Generar Informes</h5>
                    <p class="card-text">Genera reportes detallados.</p>
                    <a href="{{ url('reports/formulario') }}" class="btn btn-secondary btn-block">Generar Informe</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
