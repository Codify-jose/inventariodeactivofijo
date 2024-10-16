<?php

namespace App\Http\Controllers;
use App\Models\Activo;
use Illuminate\Http\Request;

class ActivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //listar todos los productos
                

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $mantenimientos = mantenimientos::all();
        return view('/activos/create')->with(['mantenimientos'=>$mantenimientos]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([ 
            'nombre'=> 'required', 
            'descripcion'=> 'required', 
            'codigo_inventario'=> 'required',
            'fecha_adquisicion'=> 'required', 
            'valor'=> 'required', 
            'depreciacion'=> 'required', 
            'id_categoria'=> 'required', 
            'id_ubicacion'=> 'required', 
            'id_usuario'=> 'required', 

            ]); 
            // Enviar insert 
            Activo::create($data); 
            // Redireccionar 
            return redirect('/activos/show'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
