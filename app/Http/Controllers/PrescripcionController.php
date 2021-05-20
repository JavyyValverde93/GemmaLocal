<?php

namespace App\Http\Controllers;

use App\Models\Prescripcion;
use App\Models\Actividad;
use App\Models\Plazoprescripcion;
use Illuminate\Http\Request;

class PrescripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prescripciones = Prescripcion::orderBy('id', 'desc')->paginate(20);
        if($request->plazoprescripcion=='true'){
            $plazosprescripciones = Plazoprescripcion::orderBy('fecha_fin', 'desc')->paginate(20);
            return view('plazosprescripciones.plazoprescripcion', compact('prescripciones', 'request', 'plazosprescripciones'));
        }
        return view('prescripciones.index', compact('prescripciones', 'request'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $actividades = Actividad::orderBy('nombre')->paginate(10);
        return view('prescripciones.create', compact('request', 'actividades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_alumno' => 'required',
            'id_actividad' => 'required',
            'id_plazoprescripcion' => 'required'
        ]);
        
        $validar = Prescripcion::where('id_alumno', $request->id_alumno)
        ->where('id_actividad', $request->id_actividad)
        ->where('id_plazoprescripcion', $request->id_plazoprescripcion)->first();
         
        if($validar!=null){
            return back()->with('error', 'La prescripción ya existe');
        }

        try{
            $prescripcion = new Prescripcion();
            $prescripcion->id_alumno = $request->id_alumno;
            $prescripcion->id_actividad = $request->id_actividad;
            $prescripcion->id_plazoprescripcion = $request->id_plazoprescripcion;
            $prescripcion->fecha_creacion = now()->getTimestamp();
            $prescripcion->save();

            return redirect()->route('prescripciones.index')->with('mensaje', 'Prescripción realizada');
        }catch(\Exception $ex){
            return back()->with('error', 'La prescripción no ha podido realizarse');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescripcion  $prescripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Prescripcion $prescripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescripcion  $prescripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescripcion $prescripcion)
    {
        return view('prescripciones.edit', compact('prescripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescripcion  $prescripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescripcion $prescripcion)
    {
        $request->validate([
            'id_usuario' => 'required',
            'id_actividad' => 'required',
            'id_plazoprescripcion' => 'required'
        ]);

        try{
            $prescripcion->id_usuario = $request->id_usuario;
            $prescripcion->id_actividad = $request->id_actividad;
            $prescripcion->id_plazoprescripcion = $request->id_plazoprescripcion;
            $prescripcion->fecha_creacion = now()->getTimestamp();
            $prescripcion->save();

            return back()->with('mensaje', 'Prescripción modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'La prescripción no ha podido modificarse');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescripcion  $prescripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescripcion $prescripcion)
    {
        //
    }
}
