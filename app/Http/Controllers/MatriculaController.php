<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Grupo;
use App\Models\Plazomatricula;
use App\Models\Prescripcion;
use App\Models\Actividad;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matriculas = Matricula::orderBy('id', 'desc')->paginate(20);
        if($request->plazomatricula=='true'){
            $plazosmatriculas = Plazomatricula::orderBy('fecha_fin', 'desc')->paginate(20);
            return view('plazosmatriculas.plazomatricula', compact('matriculas', 'request', 'plazosmatriculas'));
        }
        return view('matriculas.index', compact('matriculas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $grupos = Grupo::orderBy('nombre')->nombre($request->nombre)->paginate(15);
        if($request->id_actividad!=null){
            $id_grupo = Actividad::where('id', $request->id_actividad)->first()->id;
            $request->id_grupo = $id_grupo;
            return redirect()->route('matriculas.store', compact('request'));
        }
        return view('matriculas.create', compact('request', 'grupos'));
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
            'id_alumno' => 'required',
            'id_grupo' => 'required',
            'id_plazomatricula' => 'required',
        ]);

        $validar = Matricula::where('id_alumno', $request->id_alumno)
        ->where('id_grupo', $request->id_grupo)
        ->where('id_plazomatricula', $request->id_plazomatricula)->first();
         
        if($validar!=null){
            return back()->with('error', 'La matrícula ya existe');
        }

        try{
            $matricula = new Matricula();
            $matricula->id_alumno = $request->id_alumno;
            $matricula->id_grupo = $request->id_grupo;
            $matricula->id_plazomatricula = $request->id_plazomatricula;
            $matricula->fecha_creacion = now()->getTimestamp();
            $matricula->id_prescripcion = $request->id_prescripcion;
            $matricula->save();
            return redirect()->route('alumnos.index')->with('mensaje', 'Matrícula creada');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido crearse la matricula');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        return view('matriculas.edit', compact($matricula));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'id_alumno' => 'required',
            'id_grupo' => 'required',
        ]);

        try{
            $matricula->id_alumno = $request->id_usuario;
            $matricula->id_grupo = $request->id_grupo;
            $matricula->fecha_creacion = now()->getTimestamp();
            $matricula->id_prescripcion = $request->id_prescripcion;
            $matricula->save();
            return back()->with('mensaje', 'Matrícula modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido modificarse la matricula');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}
