@extends('layouts.app')

@section('title', 'Crear')

@section('content')
<h1 class="text-center my-4">Crear</h1>
<h5 class="text-center mb-4">Formulario para crear un mantenimiento</h5>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-light p-4 rounded">
            <form action="/mantenimiento/store" method="POST">
                @csrf
                <div class="row mb-3">
                <div class="mb-3">
                    <label for="id_activo" class="form-label">Activos</label>
                    <select name="id_activo" id="id_activos" class="form-select">
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
                    <div class="col-md-6">
                        <label for="fecha_mantenimiento" class="form-label">fecha de mantenimieto</label>
                        <input type="date" class="form-control" id="fecha_mantenimiento" name="fecha_mantenimiento">
                        @error('fecha_mantenimiento')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" step="any" class="form-control" id="costo" name="costo" value="{{old('costo')}}">
                        @error('costo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion" class="form-label"> Descripción</label>
                        <input type="text" step="any" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                        @error('descripcion')
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
                    @error('id_usuario')
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