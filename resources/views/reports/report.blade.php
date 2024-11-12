<form action="/reportes/activos" method="POST">
    @csrf
    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" name="fecha_inicio" required>

    <label for="fecha_fin">Fecha de Fin:</label>
    <input type="date" name="fecha_fin" required>

    <button type="submit">Generar Reporte</button>
</form>
