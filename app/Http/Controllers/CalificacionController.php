<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'id_grupo' => 'required',
            'id_periodocalificacion' => 'required',
            'nota' => 'required'
        ]);

        try{
            $calificacion = new Calificacion();

            $calificacion->id_alumno = $request->id_alumno;
            $calificacion->id_actividad = $request->id_actividad;
            $calificacion->id_grupo = $request->id_grupo;
            $calificacion->id_periodocalificacion = $request->id_periodocalificacion;
            $calificacion->nota = $request->nota;

            $calificacion->save();

            return back()->with('mensaje', 'Calificación creada');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al calificar');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificacion $calificacion)
    {
        $request->validate([
            'id_alumno' => 'required',
            'id_actividad' => 'required',
            'id_grupo' => 'required',
            'id_periodocalificacion' => 'required',
            'nota' => 'required'
        ]);

        try{

            $calificacion->id_alumno = $request->id_alumno;
            $calificacion->id_actividad = $request->id_actividad;
            $calificacion->id_grupo = $request->id_grupo;
            $calificacion->id_periodocalificacion = $request->id_periodocalificacion;
            $calificacion->nota = $request->nota;

            $calificacion->save();

            return back()->with('mensaje', 'Calificación modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al modificar la calificación');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }
}
