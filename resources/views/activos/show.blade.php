@extends('layout.app')

@section('title', 'Activos')

@section('content')
<!-- Encabezado con estilo -->
 <style>
    a.btn:hover {
    transform: scale(1.05);
    transition: all 0.3s ease-in-out;
}

.btn-crear:hover, 
.btn-pdf:hover, 
.btn-modificar:hover, 
.btn-eliminar:hover {
        filter: brightness(0.85);
        transition: filter 0.3s ease;
}
 </style>
<div class="container">
    <div class="card my-4 shadow-lg">
        <div class="card-body text-center">
            <h1 class="display-4">Activos</h1>
            <h5 class="text-muted">Listado de activos registrados</h5>
        </div>
    </div>
    
    <!-- Botones de acción con nuevos colores -->
    <div class="d-flex justify-content-between mb-4">
        <a class="btn btn-sm shadow" href="/activos/create" 
           style="background: linear-gradient(45deg, #1e88e5, #64b5f6); border: none; color: white;">
           Agregar nuevo activo
        </a>
        <a class="btn btn-sm shadow" href="/reporte" 
           style="background: linear-gradient(45deg, #1e88e5, #64b5f6); border: none; color: white;">
           Generar PDF
        </a>
    </div>

    <!-- Tabla de activos con estilo -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Codigo de inventario</th>
                        <th scope="col">Fecha de adquision</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Depreciación</th>
                        <th scope="col">Código de categoria</th>
                        <th scope="col">Código de ubicación</th>
                        <th scope="col">Código de usuario</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Listado de activos --}}
                   {{-- @foreach ($activos as $item) --}}
                    <tr class="table-light">
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>${{ number_format($item->precio, 2) }}</td>
                        <td>{{ $item->marca }}</td>
                        <td>
                            <a class="btn btn-sm shadow" href="/activos/update/{{$item->codigo}}" 
                               style="background: linear-gradient(45deg, #8e24aa, #ab47bc); border: none; color: white;">
                               Modificar
                            </a>
                            <button class="btn btn-danger btn-sm shadow" url="/activos/destroy/{{$item->codigo}}" 
                                    onclick="destroy(this)" token="{{ csrf_token() }}" 
                                    style="background: linear-gradient(45deg, #f44336, #ef5350); border: none;">
                               Eliminar
                            </button>
                        </td>
                    </tr>
                   {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts') 
{{-- SweetAlert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- JS --}}
<script src="{{ asset('js/product.js') }}"></script>
@endsection