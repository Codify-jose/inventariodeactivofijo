<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Activo;
use App\Models\Mantenimiento;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
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
                // Listar todos los activos con sus relaciones
                $mantenimientos = Mantenimiento::select(
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
                return view('mantenimiento.show', compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $activos = Activo::all();
        $usuarios = Usuario::all();
        
        return view('mantenimiento.create')->with(['activos' => $activos, 'usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'id_activo' => 'required',
            'fecha_mantenimiento' => 'required|date',
            'costo' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'descripcion' => 'required|string|max:500',
            'id_usuario' => 'required',
        ], [
            'id_activo.required' => 'El campo ID de activo es obligatorio.',
            
            'fecha_mantenimiento.required' => 'El campo fecha de mantenimiento es obligatorio.',
            'fecha_mantenimiento.date' => 'La fecha de mantenimiento debe ser una fecha válida.',
            
            'costo.required' => 'El campo costo es obligatorio.',
            'costo.numeric' => 'El costo debe ser un número.',
            'costo.regex' => 'El costo debe tener hasta dos decimales.',
            'costo.min' => 'El costo no puede ser negativo.',
            
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El formato del campo descripción no es válido.',
            'descripcion.max' => 'La descripción no debe exceder los 100 caracteres.',
            'descripcion.regex' => 'El campo descripción solo debe contener letras, números y espacios.',
            
            'id_usuario.required' => 'El campo ID de usuario es obligatorio.',
        ]);
        // Insertar un nuevo activo
        Mantenimiento::create($data);

        // Redireccionar
        return $this->notificationService->notify('Mantenimiento ha sido guardado correctamente', '/mantenimiento/show');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mantenimiento $mantenimientos)
    {
        //
        $activos = Activo::all();
        $usuarios = Usuario::all();

        return view('/mantenimiento/update')->with([
            'mantenimiento' => $mantenimientos,
            'activo' => $activos,
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mantenimiento $mantenimientos)
    {
        //
        $data = $request->validate([
            'id_activo' => 'required',
            'fecha_mantenimiento' => 'required|date',
            'costo' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|min:0',
            'descripcion' => 'required|string|max:500',
            'id_usuario' => 'required',
        ], [
            'id_activo.required' => 'El campo ID de activo es obligatorio.',
            
            'fecha_mantenimiento.required' => 'El campo fecha de mantenimiento es obligatorio.',
            'fecha_mantenimiento.date' => 'La fecha de mantenimiento debe ser una fecha válida.',
            
            'costo.required' => 'El campo costo es obligatorio.',
            'costo.numeric' => 'El costo debe ser un número.',
            'costo.regex' => 'El costo debe tener hasta dos decimales.',
            'costo.min' => 'El costo no puede ser negativo.',
            
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El formato del campo descripción no es válido.',
            'descripcion.max' => 'La descripción no debe exceder los 100 caracteres.',
            'descripcion.regex' => 'El campo descripción solo debe contener letras, números y espacios.',
            
            'id_usuario.required' => 'El campo ID de usuario es obligatorio.',
        ]);

        // Actualizar los datos del activo
        $mantenimientos->update($data);
   
        // Redireccionar
        return $this->notificationService->notify('Mantenimiento ha sido modificado correctamente', '/mantenimiento/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Mantenimiento::destroy($id);
        return response()->json(array('res'=>true)); 
    } 
}
