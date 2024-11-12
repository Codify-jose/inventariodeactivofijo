@extends('layouts.app')

@section('title', 'Crear')

@section('content')
<h1 class="text-center my-4">Crear</h1>
<h5 class="text-center mb-4">Formulario para crear un historial de movimiento</h5>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-light p-4 rounded">
            <form action="/historial_movimiento/store" method="POST">
                @csrf
                <div class="row mb-3">
                <div class="mb-3"> 
                    <label for="id_activo" class="form-label">Activo</label>
                    <select name="id_activo" id="id_activo" class="form-select">
                        @foreach ($activos as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_activo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_ubicacion_anterior" class="form-label">Ubicación anterior</label>
                    <select name="id_ubicacion_anterior" id="id_ubicacion_anterior" class="form-select">
                        @foreach ($ubicaciones as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_ubicacion_anterior')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_ubicacion_nueva" class="form-label">Ubicación nueva</label>
                    <select name="id_ubicacion_nueva" id="id_ubicacion_nueva" class="form-select">
                        @foreach ($ubicaciones as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_ubicacion_nueva')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                    <div class="col-md-6">
                        <label for="fecha_movimiento" class="form-label">Fecha de movimiento</label>
                        <input type="date" class="form-control" id="fecha_movimiento" name="fecha_movimiento">
                        @error('fecha_movimiento')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="id_usuario" class="form-label">Usuario</label>
                    <select name="id_usuario" id="id_usuario" class="form-select">
                        @foreach ($usuarios as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_usuarios')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
@endsection