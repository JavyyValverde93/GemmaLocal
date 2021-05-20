<?php

namespace App\Http\Controllers;

use App\Models\Periodocalificacion;
use DateTime;
use Illuminate\Http\Request;

class PeriodocalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periodoscalificaciones = Periodocalificacion::orderBy('id', 'desc')->paginate(15);
        if($request->c="p"){
            return view('periodoscalificaciones.periodocalificacion', compact('periodoscalificaciones', 'request'));
        }
        return view('periodoscalificaciones.index', compact('periodoscalificaciones', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodoscalificaciones.create');
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
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ]);

        try{
            $periodocalificacion = new Periodocalificacion();
            $periodocalificacion->nombre = $request->nombre;
            $date = new \DateTime($request->fecha_inicio);
            $date2 = new DateTime($request->fecha_fin);
            $periodocalificacion->fecha_inicio = $date->getTimestamp();
            $periodocalificacion->fecha_fin = $date2->getTimestamp();
            $periodocalificacion->save();
            $this->Log("Ha creado el periodo de calificación $periodocalificacion->nombre");
            return back()->with('mensaje', 'Periodo creado');
        }catch(\Exception $ex){
            $this->Log("Error al crear el periodo de calificación $request->nombre");
            return back()->with('error', 'No ha podido crearse el periodo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodocalificacion  $periodocalificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Periodocalificacion $periodocalificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodocalificacion  $periodocalificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodocalificacion $periodocalificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periodocalificacion  $periodocalificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodocalificacion $periodocalificacion)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ]);

        try{
            $periodocalificacion->nombre = $request->nombre;
            $periodocalificacion->fecha_inicio = $request->fecha_inicio;
            $periodocalificacion->fecha_fin = $request->fecha_fin;
            $periodocalificacion->save();
            $this->Log("Ha modificado el periodo de calificación $request->nombre");
            return back()->with('mensaje', 'Periodo modificado');
        }catch(\Exception $ex){
            $this->Log("Error al modificar periodo de calificación $request->nombre");
            return back()->with('error', 'No ha podido modificarse el periodo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodocalificacion  $periodocalificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodocalificacion $periodocalificacion)
    {
        //
    }
}
