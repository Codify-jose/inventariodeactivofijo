@extends('layouts.app')

@section('title', 'Modificar')

@section('content')
<h1 class="text-center my-4">Modificar</h1>
<h5 class="text-center mb-4">Formulario para modificar categorias</h5>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-light p-4 rounded">
            <form action="/categorias_activos/update/{{$categoriasActivo->id}}" method="POST">
                @csrf
                @method('PUT') 
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                        value="{{$categoriasActivo->nombre}}"> @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                        value="{{$categoriasActivo->descripcion}}">@error('descripcion')
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