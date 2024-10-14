@extends('layout.app')

@section('title', 'Historial de movimientos')

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
            <h1 class="display-4">Historial de movimientos</h1>
            <h5 class="text-muted">Listado de movimientos</h5>
        </div>
    </div>
    
    <!-- Botones de acción con nuevos colores -->
    <div class="d-flex justify-content-between mb-4">
        <a class="btn btn-sm shadow" href="/historial_movimiento/create" 
           style="background: linear-gradient(45deg, #1e88e5, #64b5f6); border: none; color: white;">
           Agregar nuevo movimiento
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
                        <th scope="col">ID de activo</th>
                        <th scope="col">ID de ubacación anterios</th>
                        <th scope="col">ID de ubacación nueva</th>
                        <th scope="col">fecha de movimiento</th>
                        <th scope="col">ID de usuario</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- Listado de movimientos --}}
                   {{-- @foreach ($historial_movimiento as $item) --}}
                    <tr class="table-light">
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->id_activo }}</td>
                        <td>{{ $item->id_ubicacion_anterior }}</td>
                        <td>{{ $item->id_ubicacion_nueva }}</td>
                        <td>{{ $item->fecha_movimiento }}</td>
                        <td>{{ $item->id_usuario}}</td>
                        <td>
                            <a class="btn btn-sm shadow" href="/historial_movimiento/update/{{$item->codigo}}" 
                               style="background: linear-gradient(45deg, #8e24aa, #ab47bc); border: none; color: white;">
                               Modificar
                            </a>
                            <button class="btn btn-danger btn-sm shadow" url="/historial_movimiento/destroy/{{$item->codigo}}" 
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