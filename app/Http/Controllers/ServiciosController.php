<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests\ServiciosRequest;
use App\Http\Requests\ServiciosActualizarRequest;

class ServiciosController extends Controller
{
    public function index(){

        $servicios = Servicio::all();
        return view('Servicios.index', compact('servicios'));

    }

    public function guardar(ServiciosRequest $request){

        $campos=request()->validate([
            'nombre'=>'',
            'descripcion'=>'',
            'precio'=>'',
            'tiempo'=>'',
            'estado'=>'',
    
        ]);
        Servicio::create($campos);

        return redirect('servicios')->with('mensaje', 'Servicio guardo'); 
    
    }

    public function actualizar(Servicio $servicio, ServiciosActualizarRequest $request){

        $campos=request()->validate([
            'nombre'=>'',
            'descripcion'=>'',
            'precio'=>'',
            'tiempo'=>'',
            'estado'=>'',
    
        ]);
        $servicio->update($campos);
    
        return redirect('servicios')->with('mensaje', 'Servicio actualizado');
    }


   /*  public function eliminar(Servicio $servicio)
    {
        $servicio->delete();
        return redirect('servicios')->with('mensaje', 'Servicio eliminada');
    }*/
} 
