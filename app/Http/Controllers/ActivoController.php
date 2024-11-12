<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Activo;
use App\Models\CategoriaActivo;
use App\Models\Ubicacion;
use App\Models\Usuario;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class ActivoController extends Controller
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
        $activos = Activo::select(
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
    
        return view('activos.show', compact('activos'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriaActivo::all();
        $ubicaciones = Ubicacion::all();
        $usuarios = Usuario::all();
        
        return view('activos.create')->with([
            'categorias' => $categorias, 
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
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'descripcion' => 'required|string|regex:/^[\pL\pN\s]+$/u|max:500',
            'codigo_inventario' => 'required|string|max:50',
            'fecha_adquisicion' => 'required|date',
            'valor' => 'required|numeric|min:0',
            'depreciacion' => 'required|numeric|min:0',
            'id_categoria' => 'required',
            'id_ubicacion' => 'required',
            'id_usuario' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El formato del campo descripción no es válido.',
            'descripcion.regex' => 'El campo descripción solo debe contener letras, números y espacios.',
            'codigo_inventario.required' => 'El campo código de inventario es obligatorio.',
            'fecha_adquisicion.required' => 'El campo fecha de adquisición es obligatorio.',
            'valor.required' => 'El campo valor es obligatorio.',
            'depreciacion.required' => 'El campo depreciación es obligatorio.',
            'id_categoria.required' => 'El campo categoría es obligatorio.',
            'id_ubicacion.required' => 'El campo ubicación es obligatorio.',
            'id_usuario.required' => 'El campo usuario es obligatorio.',
        ]);
        // Insertar un nuevo activo
        Activo::create($data);

        // Redireccionar
        return $this->notificationService->notify('Activo ha sido guardado correctamente por jose', '/activos/show');
    }
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activo $activos)
    {
        $categorias = CategoriaActivo::all();
        $ubicaciones = Ubicacion::all();
        $usuarios = Usuario::all();

        return view('activos/update')->with([
            'activo' => $activos,
            'categorias' => $categorias,
            'ubicaciones' => $ubicaciones,
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activo $activos)
    {
        $data = $request->validate([
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'descripcion' => 'required|string|regex:/^[\pL\pN\s]+$/u|max:500',
            'codigo_inventario' => 'required|string|max:50',
            'fecha_adquisicion' => 'required|date',
            'valor' => 'required|numeric|min:0',
            'depreciacion' => 'required|numeric|min:0',
            'id_categoria' => 'required',
            'id_ubicacion' => 'required',
            'id_usuario' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El formato del campo descripción no es válido.',
            'descripcion.regex' => 'El campo descripción solo debe contener letras, números y espacios.',
            'codigo_inventario.required' => 'El campo código de inventario es obligatorio.',
            'fecha_adquisicion.required' => 'El campo fecha de adquisición es obligatorio.',
            'valor.required' => 'El campo valor es obligatorio.',
            'depreciacion.required' => 'El campo depreciación es obligatorio.',
            'id_categoria.required' => 'El campo categoría es obligatorio.',
            'id_ubicacion.required' => 'El campo ubicación es obligatorio.',
            'id_usuario.required' => 'El campo usuario es obligatorio.',
        ]);

        $activos->nombre = $data['nombre']; 
        $activos->descripcion = $data['descripcion']; 
        $activos->codigo_inventario = $data['codigo_inventario']; 
        $activos->fecha_adquisicion = $data['fecha_adquisicion']; 
        $activos->valor = $data['valor']; 
        $activos->depreciacion = $data['depreciacion']; 
        $activos->id_categoria = $data['id_categoria']; 
        $activos->id_ubicacion = $data['id_ubicacion']; 
        $activos->id_usuario = $data['id_usuario']; 
        $activos->updated_at = now();
        $activos->save(); 
        // Redireccionar
        return $this->notificationService->notify('Activo ha sido modificado correctamente', '/activos/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Activo::destroy($id);
        return response()->json(array('res'=>true)); 
    }    
}
