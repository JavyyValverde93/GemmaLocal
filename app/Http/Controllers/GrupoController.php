<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Categoria;
use App\Models\Grupo;
use App\Models\Profesor;
use App\Models\Espacio;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grupos = Grupo::orderBy('id', 'desc')->nombre($request->nombre)->paginate('15');
        if($request->redirect=="matriculas"){
            return view('matriculas.create', compact('request', 'grupos'));
        }
        return view('grupos.index', compact('grupos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Profesor::orderBy('apellidos')->get();
        $espacios = Espacio::orderBy('planta')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        return view('grupos.create', compact('profesores', 'espacios', 'categorias'));
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
            'nombre' => 'required|unique:grupos',
            'id_espacio' => 'required',
            'id_categoria' => 'required',
            'nombre_actividad' => 'required|unique:actividades,nombre',
            'descripcion' => 'required',
            'horas' => 'required',
            'asistencia' => 'required',
            'anio_academico' => 'required',
        ]);

        try{
            $grupo = new Grupo();
            $grupo->id_profesor = $request->id_profesor;
            $grupo->nombre = $request->nombre;
            $grupo->id_espacio = $request->id_espacio;
            $grupo->fecha_creacion = now()->getTimestamp();
            $grupo->fecha_modificacion = now()->getTimestamp();

            $actividad = new Actividad();
            $actividad->nombre = $request->nombre_actividad;
            $actividad->descripcion = $request->descripcion;
            $actividad->id_profesor = $request->id_profesor;
            $actividad->id_categoria = $request->id_categoria;
            $actividad->horas = $request->horas;
            $actividad->asistencia = $request->asistencia;
            $actividad->anio_academico = $request->anio_academico;
            $actividad->fecha_creacion = now()->getTimestamp();
            $actividad->fecha_modificacion = now()->getTimestamp();

            $grupo->save();
            $actividad->id_grupo = $grupo->id;
            $actividad->save();

            return redirect()->route('grupos.index')->with('mensaje', 'Grupo creado');
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
