<?php

namespace App\Http\Controllers;

use App\Models\Plazomatricula;
use Illuminate\Http\Request;

class PlazomatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plazosmatriculas = Plazomatricula::orderBy('id', 'desc')->paginate(15);
        return view('plazosmatriculas.index', compact('plazosmatriculas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plazosmatriculas.create');
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
            'nombre' => 'required|unique:plazosmatriculas,nombre',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ],[
            'nombre.required'=>'Es obligatorio el nombre',
            'fecha_inicio.required'=>'Es obligatorio la fecha de inicio',
            'fecha_fin.required'=>'Es obligatorio la fecha de fin'
        ]);

        try{
            $plazomatricula = new Plazomatricula();
            $plazomatricula->nombre = $request->nombre;
            $date = new \DateTime($request->fecha_inicio);
            $date = $date->getTimestamp();
            $date2 = new \DateTime($request->fecha_fin);
            $date2 = $date2->getTimestamp();
            $plazomatricula->fecha_inicio = $date;
            $plazomatricula->fecha_fin = $date2;

            $plazomatricula->save();
            $this->Log("Ha creado el plazo de matriculación $request->nombre");

            return redirect()->route('plazosmatriculas.index')->with('mensaje', 'Plazo creado correctamente');

        }catch(\Exception $ex){
            $this->Log("Error al crear el plazo de matriculación $request->nombre");
            return back()->with('error', 'No se ha podido crear el nuevo plazo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plazomatricula  $plazomatricula
     * @return \Illuminate\Http\Response
     */
    public function show(Plazomatricula $plazomatricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plazomatricula  $plazomatricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Plazomatricula $plazosmatricula)
    {
        $plazomatricula = $plazosmatricula;
        return view('plazosmatriculas.edit', compact('plazomatricula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plazomatricula  $plazomatricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plazomatricula $plazosmatricula)
    {
        $plazomatricula = $plazosmatricula;
        $request->validate([
            'nombre' => "required|unique:plazosmatriculas,nombre,$plazomatricula->id",
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ],[
            'nombre.required'=>'Es obligatorio el nombre',
            'nombre.unique'=>'El nombre debe ser único',
            'fecha_inicio.required'=>'Es obligatorio la fecha de inicio',
            'fecha_fin.required'=>'Es obligatorio la fecha de fin'
        ]);

        try{
            $plazomatricula->nombre = $request->nombre;
            $date = new \DateTime($request->fecha_inicio);
            $date = $date->getTimestamp();
            $date2 = new \DateTime($request->fecha_fin);
            $date2 = $date2->getTimestamp();
            $plazomatricula->fecha_inicio = $date;
            $plazomatricula->fecha_fin = $date2;

            $plazomatricula->save();
            $this->Log("Ha modificado el plazo de matriculación $request->nombre");

            return redirect()->route('plazosmatriculas.index')->with('mensaje', 'Plazo modificado correctamente');

        }catch(\Exception $ex){
            $this->Log("Error al modificar plazo de matriculación $request->nombre");
            return back()->with('error', 'No se ha podido modificar el plazo'.$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plazomatricula  $plazomatricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plazomatricula $plazomatricula)
    {
        //
    }
}
