<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DomocaracteristicaRequest;
use App\Models\Caracteristica;
use App\Models\Domo;
use App\Models\DomoCaracteristica;
use Illuminate\Support\Facades\DB;

class DomoCaracteristicaController extends Controller
{
    public function index(){
        $caracteristicas = Caracteristica::where('estado', 1)->get();
        $domos = Domo::where('estado', 1)->get();
        //Retornamos utiliizando compact, ára retornar un array de variables con sus valores
        return view('domocaracteristica.index', compact('caracteristicas'));
    }

    public function save(DomocaracteristicaRequest $request){

            $input = $request->all();
            try{
                DB::beginTransaction();
            $domo = Domo::create([

                "nombre"=>$input["nombre"],
                "descripcion"=>$input["descripcion"],
                "capacidad"=>$input["capacidad"],
                "numerobaños"=>$input["numerobaños"],
                "tipodomo"=>$input["tipodomo"],
                "estado"=>1
            ]);

           foreach($input["caracteristica_id"] as $key => $value){
                DomoCaracteristica::create([
                    "caracteristica_id"=>$value,
                    "domo_id"=>$domo->id,
                    "cantidad"=>$input["cantidades"][$key]
                ]);

                $ins = Caracteristica::find($value);
                /*  if($input["cantidades"] <= "cantidad"->$ins->cantidad)  */
                $ins->update(["cantidad"=> $ins->cantidad - $input["cantidades"][$key]]);

            }

                DB::commit();
                return redirect("/domo/listar")->with('status', '1');
        }catch(\Exception $e){

                 DB::rollBack();

                return redirect("/domo/caracteristicas")->with('status', $e->getMessage());

        }

        /* $id = $request->input("id");
        $caracteristicas = [];
        if($id != null){
            $caracteristicas = Caracteristica::select("caracteristica.*", "domo_caracteristica.cantidad as cantidad_c")
            ->join("domo_caracteristica", "caracteristica.id", "=", "domo_caracteristica.caracteristica_id")
            ->where("domo_caracteristica.domo_id", $id)
            ->get();
        }
        $domos = Domo::select("domo.*")->get(); */

    }


    public function show(Request $request){

        $id = $request->input("id");
        $caracteristicas = [];
        if($id != null){
            $caracteristicas = Caracteristica::select("caracteristica.*", "domo_caracteristica.cantidad as cantidad_c")
            ->join("domo_caracteristica", "caracteristica.id", "=", "domo_caracteristica.caracteristica_id")
            ->where("domo_caracteristica.domo_id", $id)
            ->get();
        }

        $domos = Domo::select("domo.*")->get();

        return view("domocaracteristica.show", compact('domos', 'caracteristicas'));
    }


    public function edit($id)
    {
        //muestra los datos en un formulario

        // $caracteristicas = Caracteristica::find($id);
        $domos = Domo::find($id);

        return view("domocaracteristica.edit", compact('domos'));
    }



    public function update(Request $request,  $id)
    {
        //actuliza los datos en la abase de datos
        $domos =  Domo::find($id);
        $domos->nombre = $request->post('nombre');
        $domos->descripcion = $request->post('descripcion');
        $domos->capacidad = $request->post('capacidad');
        $domos->numerobaños = $request->post('numerobaños');
        $domos->tipodomo = $request->post('tipodomo');
        $domos->estado = $request->post('estado');
        $domos->save();


        return redirect("domo/listar")->with('status', '2');
    }


    // public function update(Request $request, Domo $id)
    // {
    //     $request->validate([
    //         'nombre'=> 'required',
    //         'descripcion'=> 'required',
    //         'capacidad'=> 'required',
    //         'numerobaños'=> 'required',
    //         'tipodomo'=> 'required',
    //         'estado' => 'required',
    //     ]);

    //     $domo->update($request->all());

    //     return redirect()->route('domocaracteristica.index', $domo)->with('info', 'el domo Se actualizo con exito');
    // }


}