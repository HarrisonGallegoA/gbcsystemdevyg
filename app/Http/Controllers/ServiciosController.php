<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index(){

        $servicios = Servicio::all();
        return view('Servicios.index', compact('servicios'));

    }

    public function guardar(){

        $campos=request()->validate([
            'nombre'=>'required|min:3',
            'descripcion'=>'required',
            'precio'=>'required',
            'tiempo'=>'required',
            'estado'=>'required',
    
        ]);
        Servicio::create($campos);

        return redirect('servicios')->with('mensaje', 'Servicio guardo'); 
    
    }

    public function actualizar(Servicio $servicio){

        $campos=request()->validate([
            'nombre'=>'required|min:3',
            'descripcion'=>'required',
            'precio'=>'required',
            'tiempo'=>'required',
            'estado'=>'required',
    
        ]);
        $servicio->update($campos);
    
        return redirect('servicios')->with('mensaje', 'Servicio actualizado');
    }


    public function eliminar(Servicio $servicio)
    {
        $servicio->delete();
        return redirect('servicios')->with('mensaje', 'Servicio eliminada');
    }
}
