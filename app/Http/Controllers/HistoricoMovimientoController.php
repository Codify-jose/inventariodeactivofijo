<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use App\Models\HistoricoMovimiento;
use App\Models\Ubicacion;
use App\Models\Usuario;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class HistoricoMovimientoController extends Controller
{
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Listar todos los movimientos con sus relaciones
    $movimientos = HistoricoMovimiento::select(
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
    return view('historial_movimiento.show', compact('movimientos'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activos = Activo::all();
        $usuarios = Usuario::all();
        $ubicaciones = Ubicacion::all();
        
        return view('historial_movimiento.create')->with([
            'activos' => $activos,
            'ubicaciones' => $ubicaciones,
            'usuarios' => $usuarios
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_activo' => 'required',
            'id_ubicacion_anterior' => 'required',
            'id_ubicacion_nueva' => 'required',
            'fecha_movimiento' => 'required|date',
            'id_usuario' => 'required',
        ], [
            'id_activo.required' => 'El campo de activo es obligatorio.',
        
            'id_ubicacion_anterior.required' => 'El campo de ubicación anterior es obligatorio.',
        
            'id_ubicacion_nueva.required' => 'El campo de ubicación nueva es obligatorio.',
        
            'fecha_movimiento.required' => 'El campo de fecha de movimiento es obligatorio.',
            'fecha_movimiento.date' => 'La fecha de movimiento debe ser una fecha válida.',
        
            'id_usuario.required' => 'El campo de usuario es obligatorio.',
        ]);

        // Insertar un nuevo movimiento
        HistoricoMovimiento::create($data);

        // Redireccionar
        return $this->notificationService->notify('El hstorial de movimiento ha sido guardado correctamente', '/historial_movimiento/show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoricoMovimiento $movimientos)
    {
        $activos = Activo::all();
        $usuarios = Usuario::all();
        $ubicaciones = Ubicacion::all();

        return view('historial_movimiento.update')->with([
            'ubicaciones' => $ubicaciones,
            'activos' => $activos,
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistoricoMovimiento $movimientos)
    {
        $data = $request->validate([
            'id_activo' => 'required',
            'id_ubicacion_anterior' => 'required',
            'id_ubicacion_nueva' => 'required',
            'fecha_movimiento' => 'required|date',
            'id_usuario' => 'required',
        ], [
            'id_activo.required' => 'El campo de activo es obligatorio.',
        
            'id_ubicacion_anterior.required' => 'El campo de ubicación anterior es obligatorio.',
        
            'id_ubicacion_nueva.required' => 'El campo de ubicación nueva es obligatorio.',
        
            'fecha_movimiento.required' => 'El campo de fecha de movimiento es obligatorio.',
            'fecha_movimiento.date' => 'La fecha de movimiento debe ser una fecha válida.',
        
            'id_usuario.required' => 'El campo de usuario es obligatorio.',
        ]);

        // Actualizar los datos del movimiento
        $movimientos->update($data);

        // Redireccionar
        return $this->notificationService->notify('El historial de movimiento ha sido modificado correctamente', '/historial_movimiento/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        HistoricoMovimiento::destroy($id);
        return response()->json(array('res'=>true)); 
    } 
}
