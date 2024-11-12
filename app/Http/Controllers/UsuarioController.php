<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
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
        $usuarios = Usuario::all();
        
        return view('/usuarios/show')->with(['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/usuarios/create'); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|max:100',
            'email' => 'required|email|max:50',
            'telefono' => 'required|regex:/^[0-9]{8,11}$/'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios.',
            'nombre.max' => 'El campo nombre no debe exceder los 100 caracteres.',
        
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El campo email no debe exceder los 50 caracteres.',
        
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.regex' => 'El campo teléfono debe contener entre 10 y 15 dígitos numéricos.'
        ]);
            // Enviar insert 
            Usuario::create($data); 
            // Redireccionar 
            return $this->notificationService->notify('El Usuario ha sido guardado correctamente', '/usuarios/show');
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
    public function edit(Usuario $usuario)
    {
        //
        return view('usuarios/update')->with(['usuario'=>$usuario]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
        $data = request()->validate([
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|max:100',
            'email' => 'required|email|max:50',
            'telefono' => 'required|regex:/^[0-9]{10,15}$/'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.regex' => 'El campo nombre solo debe contener letras y espacios.',
            'nombre.max' => 'El campo nombre no debe exceder los 100 caracteres.',
        
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El campo email no debe exceder los 50 caracteres.',
        
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.regex' => 'El campo teléfono debe contener entre 10 y 15 dígitos numéricos.'
        ]);

          
            $usuario->nombre = $data['nombre']; 
            $usuario->email = $data['email']; 
            $usuario->telefono = $data['telefono']; 
            $usuario->updated_at = now();
            $usuario->save(); 
            // Redireccionar 
            return $this->notificationService->notify('El usuario ha sido modificado correctamente', '/usuarios/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->json(array('res'=>true)); 
    } 
}
