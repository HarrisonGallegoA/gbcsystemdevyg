<?php

namespace App\Http\Controllers;
use App\Models\Domo;
use App\Models\Plan;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function index(){
        $domos = Domo::find();
        $planes = Plan::find();

        return view('Dashboard', compact('planes', 'domos'));}
}
