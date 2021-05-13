<?php

namespace App\Http\Controllers;

use App\Models\Plazoprescripcion;
use Illuminate\Http\Request;

class PlazoprescripcionController extends Controller
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
            'nombre' => 'required',
            'fecha' => 'required'
        ]);

        try{
            $plazoprescripcion = new Plazoprescripcion();
            $plazoprescripcion->nombre = $request->nombre;
            $plazoprescripcion->fecha = $request->fecha->getTimestamp();

            $plazoprescripcion->save();

            return back()->with('mensaje', 'Plazo creado correctamente');

        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido crear el nuevo plazo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plazoprescripcion  $plazoprescripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Plazoprescripcion $plazoprescripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plazoprescripcion  $plazoprescripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Plazoprescripcion $plazoprescripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plazoprescripcion  $plazoprescripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plazoprescripcion $plazoprescripcion)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        try{
            $plazoprescripcion->nombre = $request->nombre;
            $plazoprescripcion->fecha_inicio = $request->fecha_inicio;
            $plazoprescripcion->fecha_fin = $request->fecha_fin;

            $plazoprescripcion->save();

            return back()->with('mensaje', 'Plazo modificado correctamente');

        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido modificar el plazo');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plazoprescripcion  $plazoprescripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plazoprescripcion $plazoprescripcion)
    {
        //
    }
}
