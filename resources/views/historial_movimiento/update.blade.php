@extends('layouts.app')

@section('title', 'Modificar')

@section('content')
<h1 class="text-center my-4">Modificar</h1>
<h5 class="text-center mb-4">Formulario para modificar el historial de movimientos</h5>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-light p-4 rounded">
            <form action="/historial_movimiento/store" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fecha_movimiento" class="form-label">Feha de movimiento</label>
                        <input type="date" class="form-control" id="fecha_movimiento" name="fecha_movimiento">
                        @error('fecha_movimiento')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="id_usuario" class="form-label">Usuario</label>
                    <select name="id_usuario" id="id_usuario" class="form-select">
                        @foreach ($usuarios as $item)
                        <option value="{{$item->id}}" {{(($item->id==$movimiento->usuario)?'selected':'')}}>{{$item->nombre}}</option>
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