<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use Illuminate\Http\Request;

class EspacioController extends Controller
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
            'nombre'=> 'required',
            'capacidad' => 'required',
            'planta' => 'required',
            'turno' => 'required'
        ]);

        try{
            $espacio = new Espacio();
            $espacio->nombre = $request->nombre;
            $espacio->capacidad = $request->capacidad;
            $espacio->planta = $request->planta;
            $espacio->activo = $request->activo;
            $espacio->aula_combinada = $request->aula_combinada;
            $espacio->turno = $request->turno;
            $espacio->fecha_creacion = now()->getTimestamp();
            $espacio->fecha_modificacion = now()->getTimestamp();

            $espacio->save();
             return back()->with('mensaje', 'Espacio creado');
        }catch(\Exception $ex){
            return back()->with('error', 'El espacio no ha podido crearse');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function show(Espacio $espacio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function edit(Espacio $espacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Espacio $espacio)
    {
        $request->validate([
            'nombre'=> 'required',
            'capacidad' => 'required',
            'planta' => 'required',
            'turno' => 'required'
        ]);

        try{
            $espacio->nombre = $request->nombre;
            $espacio->capacidad = $request->capacidad;
            $espacio->planta = $request->planta;
            $espacio->activo = $request->activo;
            $espacio->aula_combinada = $request->aula_combinada;
            $espacio->turno = $request->turno;
            $espacio->fecha_creacion = now()->getTimestamp();
            $espacio->fecha_modificacion = now()->getTimestamp();

            $espacio->save();
             return back()->with('mensaje', 'Espacio modificado');
        }catch(\Exception $ex){
            return back()->with('error', 'El espacio no ha podido modificarse');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Espacio $espacio)
    {
        //
    }
}
