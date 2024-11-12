@extends('layouts.app')

@section('title', 'Crear')

@section('content')
<h1 class="text-center my-4">Crear</h1>
<h5 class="text-center mb-4">Formulario para crear activos</h5>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-light p-4 rounded">
            <form action="/activos/store" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                        @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                        @error('descripcion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="codigo_inventario" class="form-label">Código de inventario</label>
                        <input type="number" step="any" class="form-control" id="codigo_inventario" name="codigo_inventario">
                        @error('codigo_inventario')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fecha_adquisicion" class="form-label">Fecha de adquisición</label>
                    <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion">

                    @error('fecha_adquisicion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" class="form-control" step="any" id="valor" name="valor">
                        @error('valor')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="depreciacion" class="form-label">Depreciación</label>
                        <input type="number" step="any" class="form-control" id="depreciacion" name="depreciacion">
                        @error('depreciacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="id_categoria" class="form-label">Categoria</label>
                    <select name="id_categoria" id="id_categoria" class="form-select">
                        @foreach ($categorias as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_ubicacion" class="form-label">Ubicación</label>
                    <select name="id_ubicacion" id="id_ubicacion" class="form-select">
                        @foreach ($ubicaciones as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_ubicacion')
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
                <div class="text-center mt-3">
                    <button class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
@endsection