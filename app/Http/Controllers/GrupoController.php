<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
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
            'id_profesor' => 'required',
            'nombre' => 'required',
            'id_espaico' => 'required'
        ]);

        try{
            $grupo = new Grupo();
            $grupo->id_profesor = $request->id_profesor;
            $grupo->nombre = $request->nombre;
            $grupo->id_espacio = $request->id_espacio;
            $grupo->fecha_creacion = now()->getTimestamp();
            $grupo->fecha_modificacion = now()->getTimestamp();

            $grupo->save();
            return back()->with('mensaje', 'Grupo creado');
        }catch(\Exception $ex){
            return back()->with('error', 'El grupo no ha podido crearse');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        $request->validate([
            'id_profesor' => 'required',
            'nombre' => 'required',
            'id_espaico' => 'required'
        ]);

        try{
            $grupo = new Grupo();
            $grupo->id_profesor = $request->id_profesor;
            $grupo->nombre = $request->nombre;
            $grupo->id_espacio = $request->id_espacio;
            $grupo->fecha_modificacion = now()->getTimestamp();

            $grupo->save();
            return back()->with('mensaje', 'Grupo modificado');
        }catch(\Exception $ex){
            return back()->with('error', 'El grupo no ha podido modificarse');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
