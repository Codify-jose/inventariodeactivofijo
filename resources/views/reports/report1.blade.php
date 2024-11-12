<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Activos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        h1 {
            color: black;
            text-align: center;
        }
        table {
            font-size: 16px;
            border: 1px solid #dee2e6;
            width: 100%;
        }
        th {
            background-color: #6c757d; 
            color: black;
            border: 1px solid #dee2e6;
        }
        td {
            border: 1px solid #dee2e6;
            background-color: white;
            text-align: center;
        }
        td:nth-child(odd) {
            background-color: white;
        }
        .table-container {
            padding: 20px;
        }
        .user-row td {
            background-color: white; 
            font-style: arial;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h1>Listado de Activos</h1>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="table-container">
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>ID de Inventario</th>
                            <th>Fecha de Adquisición</th>
                            <th>Valor</th>
                            <th>Depreciación</th>
                            <th>Categoría</th>
                            <th>Ubicación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item) 
                        <tr>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['nombre']}}</td>
                            <td>{{$item['descripcion']}}</td>
                            <td>{{$item['codigo_inventario']}}</td>
                            <td>{{$item['fecha_adquisicion']}}</td>
                            <td>${{$item['valor']}}</td>
                            <td>{{$item['depreciacion']}}</td>
                            <td>{{$item['categoria']}}</td>
                            <td>{{$item['ubicacion']}}</td>
                        </tr> 
                        <tr class="user-row">
                            <td colspan="9">Usuario: {{$item['usuario']}}</td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

