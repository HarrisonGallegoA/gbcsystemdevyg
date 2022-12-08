<?php

namespace App\Http\Controllers;
use App\Models\Domo;
use App\Models\Plan;
use App\Models\Venta;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){
      
        $venta =Venta::all()->count();
       
        //return view('Dashboard', compact('venta'));
        return $venta;
    }
}
