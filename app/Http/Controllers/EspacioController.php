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
    public function index(Request $request)
    {
        $espacios = Espacio::orderBy('planta')->paginate(5);
        return view('espacios.index', compact('espacios', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('espacios.create');
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
            'turno' => 'required',
        ]);
 
        if($request->activo == "false"){
            $activo = false;
        }else if($request->activo == "true"){
            $activo = true;
        }

        if($request->aula_combinada == "false"){
            $aula_combinada = false;
        }else if($request->aula_combinada == "true"){
            $aula_combinada = true;
        }

        try{
            $espacio = new Espacio();
            $espacio->nombre = $request->nombre;
            $espacio->capacidad = $request->capacidad;
            $espacio->planta = $request->planta;
            $espacio->activo = $activo;
            $espacio->aula_combinada = $aula_combinada;
            $espacio->turno = $request->turno;
            $espacio->fecha_creacion = now()->getTimestamp();
            $espacio->fecha_modificacion = now()->getTimestamp();

            $espacio->save();
             return redirect()->route('espacios.index')>with('mensaje', 'Espacio creado');
        }catch(\Exception $ex){
            return back()->with('error', 'El espacio no ha podido crearse'.$ex->getMessage());
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
