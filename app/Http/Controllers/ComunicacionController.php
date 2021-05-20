<?php

namespace App\Http\Controllers;

use App\Models\Comunicacion;
use Illuminate\Http\Request;

class ComunicacionController extends Controller
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
            'id_usuario' => 'required',
            'mensaje' => 'required'
        ]);

        try{
            $comunicacion = new Comunicacion();
            $comunicacion->id_usuario = $request->id_usuario;
            $comunicacion->mensaje = $request->mensaje;

            $comunicacion->save();
            return back()->with('mensaje', 'Mensaje creado');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido crearse el mensaje');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunicacion  $comunicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Comunicacion $comunicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunicacion  $comunicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunicacion $comunicacion)
    {
        return view('comunicaciones.edit', compact('comunicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunicacion  $comunicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunicacion $comunicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunicacion  $comunicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunicacion $comunicacion)
    {
        //
    }
}
