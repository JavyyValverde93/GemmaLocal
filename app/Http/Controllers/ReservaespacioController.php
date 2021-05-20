<?php

namespace App\Http\Controllers;

use App\Models\Reservaespacio;
use Illuminate\Http\Request;

class ReservaespacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasespacios = Reservaespacio::orderBy('fecha_modificacion')->paginate(15);
        return view('reservasespacios.index', compact('reservasespacios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservasespacios.create');
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
            'descripcion' => 'required',
            'id_grupo' => 'required',
            'id_usuario' => 'required',
            'id_espacio'=> 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ]);

        try{
            $reservaespacio = new Reservaespacio();
            $reservaespacio->nombre = $request->nombre;
            $reservaespacio->descripcion = $request->descripcion;
            $reservaespacio->id_grupo = $request->id_grupo;
            $reservaespacio->id_usuario = $request->id_usuario;
            $reservaespacio->id_espacio = $request->id_espacio;
            $reservaespacio->fecha_inicio = $request->fecha_inicio;
            $reservaespacio->fecha_fin = $request->fecha_fin;
            $reservaespacio->save();

            return back()->with('mensaje', 'Reserva realizada');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al reservar espacio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservaespacio  $reservaespacio
     * @return \Illuminate\Http\Response
     */
    public function show(Reservaespacio $reservaespacio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservaespacio  $reservaespacio
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservaespacio $reservaespacio)
    {
        return view('reservasespacios.edit', compact('reservaespacio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservaespacio  $reservaespacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservaespacio $reservaespacio)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_grupo' => 'required',
            'id_usuario' => 'required',
            'id_espacio'=> 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ]);

        try{
            $reservaespacio->nombre = $request->nombre;
            $reservaespacio->descripcion = $request->descripcion;
            $reservaespacio->id_grupo = $request->id_grupo;
            $reservaespacio->id_usuario = $request->id_usuario;
            $reservaespacio->id_espacio = $request->id_espacio;
            $reservaespacio->fecha_inicio = $request->fecha_inicio;
            $reservaespacio->fecha_fin = $request->fecha_fin;
            $reservaespacio->save();

            return back()->with('mensaje', 'Reserva modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al modificar reserva de espacio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservaespacio  $reservaespacio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservaespacio $reservaespacio)
    {
        //
    }
}
