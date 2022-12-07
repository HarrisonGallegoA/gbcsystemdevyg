<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domo;
use App\Models\Caracteristica;

class DomosController extends Controller
{
      public function index(){
        $domos = Domo::paginate();
        $caracteristicas = Caracteristica::all();
        return view('Domos.index', compact('domos', 'caracteristicas'));

    }

    public function guardar(){

        $campos=request()->validate([
            'nombredomo'=>'required|min:3',
            'descripcion'=>'required',
            'tipodomo'=>'required',
            'capacidad'=>'required',
            'numerobaños'=>'required',
            'idCaracteristicas'=>'required'

        ]);
        Domo::create($campos);

        return redirect('domos')->with('mensaje', 'Domo guardado');

    }

    public function actualizar(Domo $domo){

        $campos=request()->validate([
            'nombredomo'=>'required|min:3',
            'descripcion'=>'required',
            'tipodomo'=>'required',
            'capacidad'=>'required',
            'numerobaños'=>'required',
            'idCaracteristicas'=>'required'

        ]);
        $domo->update($campos);

        return redirect('domos')->with('mensaje', 'Domo actualizado');
    }


    /* public function eliminar(Domo $domo)
    {
        $domo->delete();
        return redirect('domos')->with('mensaje', 'Domo eliminado');
    }  */
}
