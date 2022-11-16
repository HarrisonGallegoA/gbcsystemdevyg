<?php

namespace App\Http\Controllers;

use App\Models\Domo;
use App\Models\Servicio;
use App\Models\Plan;
use App\Models\PlanServicio;
use Illuminate\Http\Request;
use DB;

class PlanServicioController extends Controller
{
    public function index(){
        $servicios = Servicio::all(); 
        $domos = Domo::all(); 
        //Retornamos utiliizando compact, ára retornar un array de variables con sus valores
        return view('planservicios.index', compact('servicios','domos')); 
    }

    public function save(Request $request){

            $input = $request->all();
            try{ 
                DB::beginTransaction();
            $plan = Plan::create([
                
                "nombre"=>$input["nombre"],
                "descripcion"=>$input["descripcion"],
                "precioplan"=>$input["precioplan"],
                "totalservicio"=>$input["totalservicio"],
                "totalplan"=>$input["totalplan"],
                "domo_id" =>$input["domo_id"],
                "estado"=>1
            ]);

           foreach($input["servicio_id"] as $key => $value){
                    PlanServicio::create([
                    "servicio_id"=>$value,
                    "plan_id"=>$plan->id,
                ]);

                 /* $ins = Servicio::find($value);
                $ins->update(["cantidad"=> $ins->cantidad - $input["cantidades"][$key]]);  */
            }

                DB::commit();
                return redirect("/plan/listar")->with('status', '1');
        }catch(\Exception $e){

                 DB::rollBack();

                return redirect("/plan/servicios")->with('status', $e->getMessage()); 

        }

    }

    public function show(Request $request){

        $id = $request->input("id");
        $servicios = [];
        if($id != null){
            $servicios = Servicio::select("servicios.*")
            ->join("plan_domo_servicio", "servicios.id", "=", "plan_domo_servicio.servicio_id")
            ->where("plan_domo_servicio.plan_id", $id)
            ->get();
        }
        
        $planes = Plan::select("plan.*", "domo.nombre as domo")
        ->join("domo", "domo.id", "=", "plan.domo_id")
        ->get();

        return view("planservicios.show", compact('planes', 'servicios'));
    }
}
