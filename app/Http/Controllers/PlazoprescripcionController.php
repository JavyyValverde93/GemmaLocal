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
        ],[
            'nombre.required'=>'Es obligatorio el nombre',
            'fecha_inicio.required'=>'Es obligatorio la fecha de inicio',
            'fecha_fin.required'=>'Es obligatorio la fecha de fin'
        ]);

        $date = new \DateTime($request->fecha_inicio);
        $date = $date->getTimestamp();
        $date2 = new \DateTime($request->fecha_fin);
        $date2 = $date2->getTimestamp();

        if($date2<=$date){
            $this->Log("Error al crear plazo de prescripción $request->nombre");
            return back()->with('error', 'No se ha podido crear el nuevo plazo');
        }

        try{
            $plazoprescripcion = new Plazoprescripcion();
            $plazoprescripcion->nombre = $request->nombre;
            $plazoprescripcion->fecha_inicio = $date;
            $plazoprescripcion->fecha_fin = $date2;
            $plazoprescripcion->save();
            $this->Log("Ha creado el plazo de prescripción $request->nombre");


            return redirect()->route('plazosprescripciones.index')->with('mensaje', 'Plazo creado correctamente');

        }catch(\Exception $ex){
            $this->Log("Error al crear el plazo de prescripción $request->nombre");
            return back()->with('error', 'No se ha podido crear el nuevo plazo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plazoprescripcion  $plazoprescripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Plazoprescripcion $plazoprescripcione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plazoprescripcion  $plazoprescripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Plazoprescripcion $plazosprescripcione)
    {
        $plazoprescripcion = $plazosprescripcione;
        return view('plazosprescripciones.edit', compact('plazoprescripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plazoprescripcion  $plazoprescripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plazoprescripcion $plazosprescripcione)
    {
        $plazoprescripcion = $plazosprescripcione;
        $request->validate([
            'nombre' => 'required|unique:plazosprescripciones,nombre,'.$plazoprescripcion->id,
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ],[
            'nombre.required'=>'Es obligatorio el nombre',
            'nombre.unique'=>'El nombre debe ser único',
            'fecha_inicio.required'=>'Es obligatorio la fecha de inicio',
            'fecha_fin.required'=>'Es obligatorio la fecha de fin'
        ]);

        $date = new \DateTime($request->fecha_inicio);
        $date = $date->getTimestamp();
        $date2 = new \DateTime($request->fecha_fin);
        $date2 = $date2->getTimestamp();

        if($date2<=$date){
            $this->Log("Error al crear plazo de prescripción $request->nombre");
            return back()->with('error', 'No se ha podido crear el nuevo plazo');
        }

        try{
            $plazoprescripcion->nombre = $request->nombre;
            $plazoprescripcion->fecha_inicio = $date;
            $plazoprescripcion->fecha_fin = $date2;
            $plazoprescripcion->save();
            $this->Log("Ha modificado el plazo de prescripción $request->nombre");

            return redirect()->route('plazosprescripciones.index')->with('mensaje', 'Plazo modificado correctamente');

        }catch(\Exception $ex){
            $this->Log("Error al modificar el plazo de prescripción $request->nombre");
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
