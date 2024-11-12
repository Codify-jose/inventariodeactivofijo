@extends('layouts.app')

@section('title', 'Ubicacion')

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
            <h1 class="display-4">Ubicaciones</h1>
            <h5 class="text-muted">Listado de ubicaciones</h5>
        </div>
    </div>
    
    <!-- Botones de acción con nuevos colores -->
    <div class="d-flex justify-content-between mb-4">
        <a class="btn btn-sm shadow btn-crear" href="/ubicaciones/create" 
           style="background: linear-gradient(45deg, #1e88e5, #64b5f6); border: none; color: white;">
           Agregar nueva ubicación
        </a>
        <a class="btn btn-sm shadow btn-pdf" href="/reporteCuatro" 
           style="background: linear-gradient(45deg, #1e88e5, #64b5f6); border: none; color: white;">
           Generar PDF
        </a>
    </div>

    <!-- Tabla de ubicaciones con estilo -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ubicaciones as $item)
                    <tr class="table-light">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->direccion }}</td>
                        <td>
                            <a class="btn btn-sm shadow btn-modificar" href="{{ route('ubicaciones.edit', $item->id) }}" 
                               style="background: linear-gradient(45deg, #8e24aa, #ab47bc); border: none; color: white;">
                               Modificar
                            </a>
                            <button class="btn btn-danger btn-sm shadow btn-eliminar" 
                                    onclick="destroy(this)" url="/ubicaciones/destroy/{{$item->id}}" 
                                    token="{{ csrf_token() }}" 
                                    style="background: linear-gradient(45deg, #f44336, #ef5350); border: none;">
                               Eliminar
                            </button>
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
<!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- JS -->
<script src="{{ asset('js/product.js') }}"></script>
<script>
    function destroy(button) {
        const url = button.getAttribute('url');
        const token = button.getAttribute('token');
        
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        Swal.fire(
                            'Eliminado',
                            'El registro ha sido eliminado.',
                            'success'
                        );
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    } else {
                        Swal.fire(
                            'Error',
                            'Hubo un problema al eliminar el registro.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
@endsection
