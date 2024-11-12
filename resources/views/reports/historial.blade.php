<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Movimientos</title>
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
            word-wrap: break-word; /* Permite que el texto largo se divida y ajuste */
            white-space: normal; /* Permite el ajuste de texto */
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Reporte de Movimientos</h2>

        <div class="report-info">
            <p><strong>Fecha de inicio:</strong> {{ $fechaInicio }}</p>
            <p><strong>Fecha de fin:</strong> {{ $fechaFin }}</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Activo</th>
                        <th>Ubicación anterior</th>
                        <th>Ubicación nueva</th>
                        <th>Fecha de movimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movimientos as $movimiento)
                        <tr>
                            <td>{{ $movimiento->id }}</td>
                            <td>{{ $movimiento->id_ubicacion_anterior }}</td>
                            <td>{{ $movimiento->id_ubicacion_nueva }}</td>
                            <td>{{ $movimiento->fecha_movimiento }}</td>
                            <td>{{ $movimiento->id_usuario }}</td>
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

