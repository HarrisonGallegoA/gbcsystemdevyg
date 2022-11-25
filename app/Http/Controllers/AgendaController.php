<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Domo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $domo = Domo::all();
        return view('agenda.index', compact('domo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $idDomo = $request->idDomo;
        $fechai = $request->fechainicio;
        $fechaf = $request->fechafinal;
        $found = Agenda::whereDate('fechainicio', ">=", $fechai,)
        ->whereDate("fechafinal","<=", $fechaf,)

        ->where('idDomo', $idDomo)->first();


        if ($found) {
            return response()->json(["error" => "Ya existe una agenda con las mismas fechas."], 403);
        }

        request()->validate([
            'idDomo' => 'required|numeric',
            'fechainicio' => 'required|date',
            'fechafinal' => 'required|date',
            'horainicio' => 'required|date_format:H:i',
            'horafinal' => 'required|date_format:H:i',

        ]);

        $agenda = Agenda::create($request->all());

        return response()->json(["success" => "La agenda se registro correctamente."]);

    }
    public function show(Agenda $agenda)
    {
        return collect(Agenda::with("domo")->get())->map(function ($d) {
            return  [
                'id' => $d['id'],
                'title' => $d['domo']['nombre'],
                'start' => $d['fechainicio'] . " " . $d['horainicio'],
                'end' => $d['fechafinal'] . " " . $d['horafinal'],
                'startHour' => $d['horainicio'],
                'EndHour' => $d['horafinal'],
                'groupId' => $d['domo']['id'],


            ];
        });

        return response()->json($agenda->all());
    }

    public function showByDay(Request $request, Agenda $agenda)
    {
        $agenda->load('domo');

        return response()->json($agenda);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $agenda = Agenda::find($id);
        if ($agenda) {
            $agenda->update($request->all());
        }
        return response()->json($agenda);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        request()->validate([
            'fechainicio' => 'required|date',
            'fechafinal' => 'required|date',
            'horainicio' => 'required|date_format:H:i',
            'horafinal' => 'required|date_format:H:i',

        ]);

        $response = $agenda->update($request->all());

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        return Agenda::destroy($id);
    }
}
