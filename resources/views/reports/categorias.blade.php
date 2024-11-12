<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Categorías</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding-top: 30px;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
        .report-info {
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        .report-info p {
            margin: 5px 0;
        }
        .table-responsive {
            margin-top: 30px;
            overflow-x: auto;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        .table th, .table td {
            padding: 8px 12px;
            text-align: left;
            vertical-align: middle;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        /* Ajustar el ancho de las columnas */
        .table td, .table th {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        .table td {
            max-width: 75px; /* Limitar el ancho máximo de las celdas */
        }
        .table th:nth-child(1),
        .table td:nth-child(1) {
            max-width: 50px; /* Ajustar el ancho de la columna ID */
        }
        .table th:nth-child(2),
        .table td:nth-child(2) {
            max-width: 150px; /* Ajustar el ancho de la columna Nombre */
        }
        .table th:nth-child(3),
        .table td:nth-child(3) {
            max-width: 200px; /* Ajustar el ancho de la columna Descripción */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reporte de Categorías</h2>

        <div class="report-info">
            <p><strong>Fecha de inicio:</strong> {{ $fechaInicio }}</p>
            <p><strong>Fecha de fin:</strong> {{ $fechaFin }}</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

