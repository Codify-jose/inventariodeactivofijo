<?php

namespace App\Http\Controllers;
use App\Models\Activo;
use App\Models\HistoricoMovimiento;
use App\Models\CategoriaActivo;
use App\Models\Ubicacion;
use App\Models\Mantenimiento;
use App\Models\Usuario;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function reporteUno() 
{ 
 // Extraer todos los activos
 $data = Activo::select( 
    "activos.id",
    "activos.nombre",
    "activos.descripcion",
    "activos.codigo_inventario",
    "activos.fecha_adquisicion",
    "activos.valor",
    "activos.depreciacion",
    "categorias_activos.nombre as categoria", 
    "ubicaciones.nombre as ubicacion",
    "usuarios.nombre as usuario"
 ) 
 ->join("categorias_activos", "categorias_activos.id", "=", "activos.id_categoria") // Se ajusta a 'id_categoria'
 ->join("ubicaciones", "ubicaciones.id", "=", "activos.id_ubicacion") // Se ajusta a 'id_ubicacion'
 ->join("usuarios", "usuarios.id", "=", "activos.id_usuario") // Se ajusta a 'id_usuario'
 ->get();
 // Cargar vista del reporte con la data
 $pdf = Pdf::loadView('/reports/report1', compact('data')); 
 return $pdf->stream('activos.pdf'); 
}

 public function reporteDos() 
{ 
 // Extraer todos los activos
 $data = CategoriaActivo::select( 
    "categorias_activos.id",
    "categorias_activos.nombre",
    "categorias_activos.descripcion",

 ) 
->get();
 // Cargar vista del reporte con la data
 $pdf = Pdf::loadView('/reports/report2', compact('data')); 
 return $pdf->stream('categorias.pdf'); 
}

public function reporteTres() 
{ 
 // Extraer todos los activos
   $data = HistoricoMovimiento::select(
      'historial_movimiento.id',
      'activos.nombre as activo',
      'ubicacion_anterior.nombre as ubicacion_anterior', 
      'ubicacion_nueva.nombre as ubicacion_nueva',       
      'historial_movimiento.fecha_movimiento',
      'usuarios.nombre as usuario'
  )
  ->join('activos', 'activos.id', '=', 'historial_movimiento.id_activo')
  ->join('ubicaciones as ubicacion_anterior', 'ubicacion_anterior.id', '=', 'historial_movimiento.id_ubicacion_anterior')
  ->join('ubicaciones as ubicacion_nueva', 'ubicacion_nueva.id', '=', 'historial_movimiento.id_ubicacion_nueva')
  ->join('usuarios', 'usuarios.id', '=', 'historial_movimiento.id_usuario')
  ->get();
  $pdf = Pdf::loadView('/reports/report3', compact('data')); 
 return $pdf->stream('movimientos.pdf'); 
}

public function reporteCuatro() 
{ 
 // Extraer todos los activos
 $data = Ubicacion::select( 
    "ubicaciones.id",
    "ubicaciones.nombre",
    "ubicaciones.direccion",

 ) 
->get();
 // Cargar vista del reporte con la data
 $pdf = Pdf::loadView('/reports/report4', compact('data')); 
 return $pdf->stream('ubicaciones.pdf'); 
}

public function reporteCinco() 
{ 
 // Extraer todos los activos
 $data = Mantenimiento::select(
   'mantenimiento.id',
   'mantenimiento.fecha_mantenimiento',
   'mantenimiento.costo',
   'mantenimiento.descripcion',
   'activos.nombre as activo',
   'usuarios.nombre as usuario'
)
->join('activos', 'activos.id', '=', 'mantenimiento.id_activo')
->join('usuarios', 'usuarios.id', '=', 'mantenimiento.id_usuario')
->get();
 // Cargar vista del reporte con la data
 $pdf = Pdf::loadView('/reports/report5', compact('data')); 
 return $pdf->stream('mantenimientos.pdf'); 
}

public function reporteSeis() 
{ 
 // Extraer todos los activos
 $data = Usuario::select( 
    "usuarios.id",
    "usuarios.nombre",
    "usuarios.email",
    "usuarios.telefono",
 ) 
->get();
 // Cargar vista del reporte con la data
 $pdf = Pdf::loadView('/reports/report6', compact('data')); 
 return $pdf->stream('usuarios.pdf'); 
}

// Método para generar el reporte de activos en PDF con rango de fechas
public function generarReporteActivos(Request $request)
{
    $fechaInicio = $request->input('fecha_inicio');
    $fechaFin = $request->input('fecha_fin');

    // Obtener los activos dentro del rango de fechas
    $activos = Activo::whereBetween('fecha_adquisicion', [$fechaInicio, $fechaFin])->get();

    // Cargar la vista y pasar los datos
    $pdf = PDF::loadView('reports.activos', compact('activos', 'fechaInicio', 'fechaFin'));

    // Retornar el PDF generado
    return $pdf->stream('reporte_activos.pdf');
}

// Método para generar el reporte de categorías en PDF con rango de fechas
public function generarReporteCategorias(Request $request)
{
    $fechaInicio = $request->input('fecha_inicio');
    $fechaFin = $request->input('fecha_fin');

    // Obtener las categorías dentro del rango de fechas
    $categorias = CategoriaActivo::whereHas('activos', function($query) use ($fechaInicio, $fechaFin) {
        $query->whereBetween('fecha_adquisicion', [$fechaInicio, $fechaFin]);
    })->get();

    // Cargar la vista y pasar los datos
    $pdf = PDF::loadView('reports.categorias', compact('categorias', 'fechaInicio', 'fechaFin'));

    // Retornar el PDF generado
    return $pdf->stream('reporte_categorias.pdf');
}

public function generarReporteHistorial(Request $request)
{
    // Validar las fechas
    $request->validate([
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
    ]);

    // Obtener las fechas del formulario
    $fechaInicio = $request->input('fecha_inicio');
    $fechaFin = $request->input('fecha_fin');

    // Obtener los movimientos dentro del rango de fechas usando la columna correcta 'fecha_movimiento'
    $movimientos = HistoricoMovimiento::whereBetween('fecha_movimiento', [$fechaInicio, $fechaFin])->get();

    // Generar el reporte en PDF
    $pdf = PDF::loadView('reports.historial', compact('movimientos', 'fechaInicio', 'fechaFin'));

    // Retornar el reporte PDF para ver en el navegador
    return $pdf->stream('reporte_historial.pdf');
}
}
