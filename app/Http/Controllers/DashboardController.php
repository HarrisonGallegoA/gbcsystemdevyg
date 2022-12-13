<?php

namespace App\Http\Controllers;

use App\Models\Domo;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
        /* public function index(){

            $reservas = DB::table('plan')->count();
            $reservasEnero = DB::table('reserva')->whereMonth('fechareserva', '=', '01')->count();
            $reservasFebrero = DB::table('reserva')->whereMonth('fechareserva', '=', '02')->count();
            $reservassMarzo = DB::table('reserva')->whereMonth('fechareserva', '=', '03')->count();
            $reservaAbril = DB::table('reserva')->whereMonth('fechareserva', '=', '04')->count();
            $reservasMayo = DB::table('reserva')->whereMonth('fechareserva', '=', '05')->count();
            $reservasJunio = DB::table('reserva')->whereMonth('fechareserva', '=', '06')->count();
            $reservasJulio = DB::table('reserva')->whereMonth('fechareserva', '=', '07')->count();
            $reservasAgosto = DB::table('reserva')->whereMonth('fechareserva', '=', '08')->count();
            $reservasSeptiembre = DB::table('reserva')->whereMonth('fechareserva', '=', '09')->count();
            $reservasOctubre = DB::table('reserva')->whereMonth('fechareserva', '=', '10')->count();
            $reservasNoviembre = DB::table('reserva')->whereMonth('fechareserva', '=', '11')->count();
            $reservasDiciembre = DB::table('reserva')->whereMonth('fechareserva', '=', '12')->count();
    
            return view('dashboard', compact('reservas','reservasEnero','reservasFebrero','reservasMarzo','reservasAbril','reservasMayo','reservasJunio','reservasJulio','reservasAgosto',
            'reservasSeptiembre','reservasOctubre','reservasNoviembre','reservasDiciembre',));
        } */
    }




