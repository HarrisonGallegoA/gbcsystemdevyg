<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Domo;
use App\Models\Plan;
use App\Models\Servicio;
use App\Models\PlanServicio;
use Illuminate\Http\Request; 
use App\Http\Requests\PlanServicioRequest;

class PlanServicioController extends Controller
{
    public function index(){
        $servicios = Servicio::where('estado', 1)->get(); 
        $domos = Domo::where('estado', 1)->get();
        //Retornamos utiliizando compact, ára retornar un array de variables con sus valores
        return view('planservicios.index', compact('servicios','domos')); 
    }

    public function save(PlanServicioRequest $request){

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

           /*  if ($input['servicio_id']) {
                # code...
            } */

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

    public function edit($id)
    {
        //muestra los datos en un formulario
        $servicioplan  = PlanServicio::select("plan_domo_servicio.*")
        ->where("plan_domo_servicio.plan_id", $id)->get();
        $servicios = Servicio::where('estado', 1)->get(); 
        $planes = Plan::find($id);
        $domos = Domo::where('estado', 1)->get();
        return view("planservicios.edit", compact('planes', 'domos', 'servicios', 'servicioplan'));
    }



    public function update(Request $request,  $id)
    {
        //actuliza los datos en la base de datos
        $plan =  Plan::find($id);
        $plan->nombre = $request->post('nombre');
        $plan->domo_id = $request->post('domo_id');
        $plan->descripcion = $request->post('descripcion');
        $plan->totalservicio = $request->post('totalservicio');
        $plan->precioplan = $request->post('precioplan');
        $plan->totalplan = $request->post('totalplan');
        $plan->estado = $request->post('estado');

        // dd($request->all());
        $plan->save();
        PlanServicio::where('plan_id','=',$plan->id)->delete();
        foreach($request["servicio_id"] as $key => $value){
            PlanServicio::create([
            "servicio_id"=>$value,
            "plan_id"=>$plan->id,
        ]);

         /* $ins = Servicio::find($value);
        $ins->update(["cantidad"=> $ins->cantidad - $input["cantidades"][$key]]);  */
    }


        return redirect("plan/listar")->with('status', '2');
    }
}
