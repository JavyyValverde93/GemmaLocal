<?php

namespace App\Http\Controllers;

use App\Models\Titulacion;
use App\Models\Actividad;
use Illuminate\Http\Request;

class TitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulaciones = Titulacion::where('id_profesor', $request->id_profesor)->paginate(10);
        $profesor = $request->profesor;
        $id_profesor = $request->id_profesor;
        return view('titulaciones.index', compact('titulaciones', 'profesor', 'request', 'id_profesor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_profesor = $request->id_profesor;
        $actividades = Actividad::select('id', 'nombre')->orderBy('nombre')->get();
        return view('titulaciones.create', compact('id_profesor', 'actividades', 'request'));
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
            'id_actividad' => 'required',
            'especialidad' => 'required',
            'titulacion' => 'required'
        ]);
        
        $validar = Titulacion::where('id_profesor', $request->id_profesor)
        ->where('id_actividad', $request->id_actividad)
        ->where('especialidad', $request->especialidad)->first();
         
        if($validar!=null){
            return back()->with('error', 'La Titulación ya existe');
        }


        try{
            $titulacion = new Titulacion();
            $titulacion->id_profesor = $request->id_profesor;
            $titulacion->id_actividad = $request->id_actividad;
            $titulacion->especialidad = $request->especialidad;
            $titulacion->titulacion = $request->titulacion;
            $titulacion->save();

            return redirect()->route('titulaciones.index', ["id_profesor=$request->id_profesor", "profesor=$request->profesor"])->with('mensaje', 'Titulación creada');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido crear la titulación');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function show(Titulacion $titulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulacion $titulacion)
    {
        return view('titulaciones.edit', compact('titulacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titulacion $titulacion)
    {
        $request->validate([
            'id_profesor' => 'required',
            'id_actividad' => 'required',
            'especialidad' => 'required',
            'titulacion' => 'required'
        ]);

        try{
            $titulacion->id_profesor = $request->id_profesor;
            $titulacion->id_actividad = $request->id_actividad;
            $titulacion->especialidad = $request->especialidad;
            $titulacion->titulacion = $request->titulacion;
            $titulacion->save();

            return back()->with('mensaje', 'Titulación modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido modificar la titulación');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulacion $titulacion)
    {
        //
    }
}
