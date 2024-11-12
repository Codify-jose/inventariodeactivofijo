@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Notificación</h5>
            </div>
            <div class="modal-body">
                @if (session('notification'))
                {{session('notification') }}
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var notification = "{{session('notification')}}";
        if (notification) {
            $('#notificationModal').modal('show');
        }
    });
</script>
<!-- Encabezado -->
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
            <h1 class="display-4">Usuarios</h1>
            <h5 class="text-muted">Listado de usuarios</h5>
        </div>
    </div>
    
    <!-- Botones de acción con nuevos colores -->
    <div class="d-flex justify-content-between mb-4">
        <a class="btn btn-sm shadow" href="/usuarios/create" 
           style="background: linear-gradient(45deg, #1e88e5, #64b5f6); border: none; color: white;">
           Agregar nuevo usuario
        </a>
        <a class="btn btn-sm shadow" href="/reporteSeis" 
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
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Listado de usuarios --}}
                    @foreach ($usuarios as $item)
                    <tr class="table-light">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>
                            <a class="btn btn-sm shadow" href="/usuarios/edit/{{$item->id}}" 
                               style="background: linear-gradient(45deg, #8e24aa, #ab47bc); border: none; color: white;">
                               Modificar
                            </a>
                            <button class="btn btn-danger btn-sm shadow" url="/usuarios/destroy/{{$item->id}}" onclick="destroy(this)" token="{{ csrf_token() }}">Eliminar</button>
                        </td>
                    </tr>
                 @endforeach
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
<script src="{{ asset('js/usuario.js') }}"></script>
@endsection