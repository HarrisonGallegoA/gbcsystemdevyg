<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caracteristica;


class CaracteristicasController extends Controller
{
     public function index(){

        $caracteristicas = Caracteristica::all();
        return view('Caracteristicas.index', compact('caracteristicas'));

    }

    public function guardar(){

        $campos=request()->validate([
            'nombre'=>'required|min:3|max:20',
            'detalle'=>'required',
            'cantidad'=>'required',
            'estado'=>'required'

        ]);
        Caracteristica::create($campos);

        return redirect('caracteristicas')->with('mensaje', 'Caracteristica guardada');

    }

    public function actualizar(Caracteristica $caracteristica){

        $campos=request()->validate([
            'nombre'=>'required|min:3',
            'detalle'=>'required',
            'cantidad'=>'required',
            'estado'=>'required',

        ]);
        $caracteristica->update($campos);

        return redirect('caracteristicas')->with('mensaje', 'Caracteristica actualizada');
    }


    /* public function eliminar(Caracteristica $caracteristica)
    {
        $caracteristica->delete();
        return redirect('caracteristicas')->with('mensaje', 'Caracteristica eliminada');
    } */
}


