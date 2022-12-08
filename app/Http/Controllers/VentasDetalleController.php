<?php

namespace App\Http\Controllers;


use App\Models\Domo;
use App\Models\Servicio;
use App\Models\Plan;
use App\Models\Reserva;
use App\Models\ReservaDetalle;
use App\Models\User;
use App\Models\Venta;
use App\Models\VentaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasDetalleController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $servicios = Servicio::where('estado', 1)->get();
        $domos = Domo::where('estado', 1)->get();
        $plan = Plan::where('estado', 1)->get();
        $reserva = Reserva::all();
        //Retornamos utiliizando compact, ára retornar un array de variables con sus valores
        return view('ventadetalle.index', compact('servicios','domos','plan','usuarios', 'reserva'));
    }

    public function save(Request $request){

            $input = $request->all();
            try{
                DB::beginTransaction();
                $reserva_id = $input["reserva_id"];
                $ins = Reserva::find($reserva_id);
                $ventas = Venta::create([
                    "user_id" => $ins->user_id,
                    "id_plan" => $ins->id_plan,
                    "domo_id" => $ins->domo_id,
                    "pagoparcial" => $ins->pagoparcial,
                    "totalpagoparcial" => $ins->totalpagoparcial,
                    "fechareserva" => $ins->fechareserva,
                    "fechainicio" => $ins->fechainicio,
                    "fechafinal" => $ins->fechafinal,
                    "fechapagoparcial" => $ins->fechapagoparcial,
                    "totalservicio" => $ins->totalservicio,
                    "estado"=>1

                ]);

            //     foreach($input["servicio_id"] as $key => $value){
            //         VentaDetalle::create([
            //         "reserva_id"=>$reserva->id,
            //         "servicio_id"=>$value->id,

            //     ]);

            //      /* $ins = Servicio::find($value);
            //     $ins->update(["cantidad"=> $ins->cantidad - $input["cantidades"][$key]]);  */
            // }

                $venta = ReservaDetalle::select("reserva_detalle.id")
                ->where("reserva_detalle.reserva_id", $input["reserva_id"])->get();

            foreach($venta as $ven){


            foreach([$ven->id] as $key=>$ve){
                $servi = ReservaDetalle::find($ve);
                $servis = VentaDetalle::create([

                    "servicio_id"=>$servi->servicio_id,
                    "reserva_id"=>$reserva_id


                ]);

            }

         }


         //    foreach($input["servicio_id"] as $key => $value){
         //             VentaDetalle::create([
         //             "servicio_id"=>$value,



         //         ]);

         //          /* $ins = Servicio::find($value);
         //         $ins->update(["cantidad"=> $ins->cantidad - $input["cantidades"][$key]]);  */
         //     }

                DB::commit();
                return redirect("/venta/listar")->with('status', '1');
        }catch(\Exception $e){

                 DB::rollBack();

                return redirect("/venta/servicios")->with('status', $e->getMessage());

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


         $venta = Venta::select("venta.*", "domo.nombre as domo","plan.nombre as plan","users.name as users")
        ->join("domo", "domo.id", "=", "venta.domo_id")
        ->join("plan", "plan.id", "=", "venta.id_plan")
        ->join("users", "users.id", "=", "venta.user_id")
        ->get();


    /*  $reserva = Reserva::select("reserva.*", "domo.nombre as domo")
        ->join("domo", "domo.id", "=", "plan.domo_id")
        ->get(); */

        return view("ventadetalle.show", compact( 'venta', 'servicios'));
    }

    public function edit($id)
    {
        //muestra los datos en un formulario

        // $caracteristicas = Caracteristica::find($id);
        $venta = Venta::find($id);
        $reserva = Reserva::all();
        $users = User::all();
        $domos = Domo::where('estado', 1)->get();
        $planes = Plan::where('estado', 1)->get();
        return view("ventadetalle.edit", compact('reserva','users','domos','planes', 'venta'));
    }



    public function update(Request $request,  $id)
    {
        //actuliza los datos en la abase de datos
        $venta =  Venta::find($id);
       /*  $reserva->user_id = $request->post('user_id'); */
        // $venta->pagoparcial = $request->post('pagoparcial');
        $venta->totalpagoparcial = $request->post('totalpagoparcial');
        // $venta->fechareserva = $request->post('fechareserva');
        // $venta->fechainicio = $request->post('fechainicio');
        // $venta->fechafinal = $request->post('fechafinal');
        // $venta->fechapagoparcial = $request->post('fechapagoparcial');
        // $venta->totalservicio = $request->post('totalservicio');
        // $venta->domo_id = $request->post('domo_id');
        // $venta->id_plan = $request->post('id_plan');
        $venta->estado = $request->post('estado');
        $venta->save();


        return redirect("venta/listar")->with('status', '2');
    }
}