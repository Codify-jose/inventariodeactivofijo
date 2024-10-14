@extends('layout.app')

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
                        <input type="double" class="form-control" id="costo" name="costo">
                        @error('costo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion" class="form-label"> Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                        @error('descripcion')
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