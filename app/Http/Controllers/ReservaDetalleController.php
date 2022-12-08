<?php

namespace App\Http\Controllers;

use App\Models\Domo;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Plan;
use App\Models\Reserva;
use App\Http\Requests\ReservaRequest;
use App\Models\ReservaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaDetalleController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $servicios = Servicio::where('estado', 1)->get();
        $domos = Domo::where('estado', 1)->get();
        $plan = Plan::where('estado', 1)->get();
        //Retornamos utiliizando compact, ára retornar un array de variables con sus valores
        return view('Reservas.index', compact('servicios','domos','plan','usuarios'));

    }

    public function save(Request $request){

            $input = $request->all();
            try{
                DB::beginTransaction();
            $reserva = Reserva::create([

                "user_id"=>$input["user_id"],
                "id_plan"=>$input["id_plan"],
                "domo_id"=>$input["domo_id"],
                "pagoparcial"=>$input["pagoparcial"],
                "totalpagoparcial"=>$input["totalpagoparcial"],
                "fechareserva" =>$input["fechareserva"],
                "fechainicio" =>$input["fechainicio"],
                "fechafinal" =>$input["fechafinal"],
                "fechapagoparcial" =>$input["fechapagoparcial"],
                "totalservicio" =>$input["totalservicio"],
                "estado"=>1
            ]);

            foreach($input["servicio_id"] as $key => $value){
                ReservaDetalle::create([
                "reserva_id"=>$reserva->id,
                "servicio_id"=>$value,

            ]);

                 /* $ins = Servicio::find($value);
                $ins->update(["cantidad"=> $ins->cantidad - $input["cantidades"][$key]]);  */
            }

                DB::commit();
                return redirect("/reserva/listar")->with('status', '1');
        }catch(\Exception $e){

                 DB::rollBack();

                return redirect("/reserva/servicios")->with('status', $e->getMessage());

        }

    }

    public function show(Request $request){

        $id = $request->input("id");
        $servicios = [];
        if($id != null){
            $servicios = Servicio::select("servicios.*")
            ->join("reserva_detalle", "servicios.id", "=", "reserva_detalle.servicio_id")
            ->where("reserva_detalle.reserva_id", $id)
            ->get();
        }

        $reserva = Reserva::select("reserva.*", "domo.nombre as domo","plan.nombre as plan","users.name as users")
        ->join("domo", "domo.id", "=", "reserva.domo_id")
        ->join("plan", "plan.id", "=", "reserva.id_plan")
        ->join("users", "users.id", "=", "reserva.user_id")
        ->get();

        return view("Reservas.show", compact( 'reserva', 'servicios'));
    }
    public function edit($id)
    {
        //muestra los datos en un formulario

        // $caracteristicas = Caracteristica::find($id);
        $reserva = Reserva::find($id);
        $users = User::all();
        $domos = Domo::where('estado', 1)->get();
        $planes = Plan::where('estado', 1)->get();

        return view("Reservas.edit", compact('reserva','users','domos','planes'));
    }



    public function update(ReservaRequest $request,  $id)
    {
        //actuliza los datos en la abase de datos
        $reserva =  Reserva::find($id);
       /*  $reserva->user_id = $request->post('user_id'); */
        $reserva->pagoparcial = $request->post('pagoparcial');
        $reserva->totalpagoparcial = $request->post('totalpagoparcial');
        $reserva->fechareserva = $request->post('fechareserva');
        $reserva->fechainicio = $request->post('fechainicio');
        $reserva->fechafinal = $request->post('fechafinal');
        $reserva->fechapagoparcial = $request->post('fechapagoparcial');
        $reserva->totalservicio = $request->post('totalservicio');
        $reserva->domo_id = $request->post('domo_id');
        $reserva->id_plan = $request->post('id_plan');
        $reserva->estado = $request->post('estado');
        $reserva->save();


        return redirect("reserva/listar")->with('status', '2');
    }
}
