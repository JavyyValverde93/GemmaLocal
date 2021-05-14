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
    public function index(Request $request)
    {
        $plazosprescripciones = Plazoprescripcion::orderBy('id', 'desc')->paginate(10);
        return view('plazosprescripciones.index', compact('plazosprescripciones', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plazosprescripciones.create');
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

        $date = new \DateTime($request->fecha_inicio);
        $date = $date->getTimestamp();
        $date2 = new \DateTime($request->fecha_fin);
        $date2 = $date2->getTimestamp();

        if($date2<=$date){
            return back()->with('error', 'No se ha podido crear el nuevo plazo');
        }

        try{
            $plazoprescripcion = new Plazoprescripcion();
            $plazoprescripcion->nombre = $request->nombre;
            $plazoprescripcion->fecha_inicio = $date;
            $plazoprescripcion->fecha_fin = $date2;
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
