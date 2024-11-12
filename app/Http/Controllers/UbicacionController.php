<?php

namespace App\Http\Controllers;
use App\Models\Ubicacion;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class UbicacionController extends Controller
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
        //
        $ubicaciones = Ubicacion::all();
        
        return view('/ubicaciones/show')->with(['ubicaciones'=>$ubicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/ubicaciones/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'direccion' => 'required|string|max:255'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios.',
            'nombre.max' => 'El campo nombre no debe exceder los 255 caracteres.',
        
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
            'direccion.max' => 'El campo dirección no debe exceder los 255 caracteres.'
        ]);
            // Enviar insert 
            Ubicacion::create($data); 
            // Redireccionar 
            return $this->notificationService->notify('La ubicación ha sido guardada correctamente', '/ubicaciones/show');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ubicacion $ubicacion)
    {
        //
        return view('/ubicaciones/update')->with(['ubicacion'=>$ubicacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        //
        $data = request()->validate([
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'direccion' => 'required|string|max:255'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios.',
            'nombre.max' => 'El campo nombre no debe exceder los 255 caracteres.',
        
            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
            'direccion.max' => 'El campo dirección no debe exceder los 255 caracteres.'
        ]);
          
            $ubicacion->nombre = $data['nombre']; 
            $ubicacion->direccion = $data['direccion']; 
            $ubicacion->updated_at = now();
            $ubicacion->save(); 
            // Redireccionar 
            return $this->notificationService->notify('La ubicación ha sido modificada correctamente', '/ubicaciones/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Ubicacion::destroy($id);
        
        return response()->json(array('res'=>true)); 
    }
}
