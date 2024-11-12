@extends('layouts.app')

@section('title', 'Generar Reportes')

@section('content')
<div class="container">
    <h2 class="my-4">Generar Reportes</h2>
    
    <!-- Formulario para generar el reporte de activos -->
    <form action="/reportes/activos" method="POST" class="mb-5">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Reporte de Activos</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" name="fecha_fin" required class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Generar Reporte de Activos</button>
            </div>
        </div>
    </form>

    <!-- Formulario para generar el reporte de categorías -->
    <form action="/reportes/categorias" method="POST" class="mb-5">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Reporte de Categorías</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" name="fecha_fin" required class="form-control">
                </div>
                
                <button type="submit" class="btn btn-success mt-3">Generar Reporte de Categorías</button>
            </div>
        </div>
    </form>

    <!-- Formulario para generar el reporte de historial de movimientos -->
    <form action="{{ route('reports.historial') }}" method="POST" class="mb-5">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Reporte de Historial de Movimientos</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-info mt-3">Generar Reporte de Movimientos</button>
            </div>
        </div>
    </form>
</div>
@endsection


