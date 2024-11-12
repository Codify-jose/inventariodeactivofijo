<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\CategoriaActivo;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class CategoriaActivoController extends Controller
{
    protected $notificationService;

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
        // Listar todas las categorias
        $categoriasActivo = CategoriaActivo::all();
        return view('/categorias_activos/show')->with(['categoriasActivo'=>$categoriasActivo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/categorias_activos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([ 
            'nombre' => 'required|regex:/^[\pL\s]+$/u|max:255', 
            'descripcion' => 'required|string|max:500'
        ], [ 
            'nombre.required' => 'El campo nombre es obligatorio.', 
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios.', 
            'descripcion.required' => 'El campo descripción es obligatorio.', 
            'descripcion.string' => 'El formato del campo de descripción no es válido.',
            'descripcion.regex' => 'El campo descripción solo debe contener letras, números y espacios.',
        ]);
            // Enviar insert 
            CategoriaActivo::create($data); 
            // Redireccionar 
            return $this->notificationService->notify('La categoria ha sido guardada correctamente', '/categorias_activos/show');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriaActivo $categoriasActivo)
    {
        //
        return view('categorias_activos/update')->with(['categoriasActivo'=>$categoriasActivo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriaActivo $categoriasActivo)
    {
        //
        $data = request()->validate([ 
            'nombre' => 'required|regex:/^[\pL\s]+$/u|max:255', 
            'descripcion' => 'required|string|max:500'
        ], [ 
            'nombre.required' => 'El campo nombre es obligatorio.', 
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios.', 
            'descripcion.required' => 'El campo descripción es obligatorio.', 
            'descripcion.string' => 'El formato del campo de descripción no es válido.',
            'descripcion.regex' => 'El campo descripción solo debe contener letras, números y espacios.',
        ]);

        $categoriasActivo->nombre = $data['nombre']; 
        $categoriasActivo->descripcion = $data['descripcion']; 
        $categoriasActivo->updated_at = now();
        $categoriasActivo->save(); 
        // Redireccionar 
    
        return $this->notificationService->notify('La categoria ha sido modificada correctamente', '/categorias_activos/show');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CategoriaActivo::destroy($id);
        return response()->json(array('res'=>true)); 
    } 
    
}
