<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Grupo;
use App\Models\Alumno;
use App\Models\Plazomatricula;
use App\Models\Prescripcion;
use App\Models\Espacio;
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
        if($request->nombre==null){
            $busqueda = ["%"];
            $matriculas = Matricula::orderBy('id', 'desc')->paginate(20);
        }else{
            $busqueda = $request->nombre;
            $alumnos = Alumno::select('id', 'nombre', 'apellidos')->orWhere('nombre', 'LIKE', "%$busqueda%")
            ->orWhere('apellidos', 'LIKE', "%$busqueda%")->get('id');
            if($alumnos->first()==null){
                $busqueda = ["%"];
                $matriculas = Matricula::orderBy('id', 'desc')->paginate(20);
            }else{
                $busqueda = $alumnos;
                $matriculas = Matricula::orderBy('id', 'desc')->orWhereIn('id_alumno', $busqueda)->paginate(20);
            }
        }
        
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
        if($request->id_actividad!=null){
            $id_grupo = Actividad::where('id', $request->id_actividad)->first();
            $request->id_grupo = $id_grupo->id;
        }

        if($request->id_grupo==null){
            $request->validate([
                'id_grupo' => 'required'
            ],[
                'id_grupo.required' => 'El grupo es obligatorio'
            ]);
        }

        $request->validate([
            'id_alumno' => 'required',
            'id_plazomatricula' => 'required',
        ],[
            'id_alumno.required' => 'Es obligatorio el id del alumno',
            'id_plazomatriculacion.required' => 'Es obligatorio el id del plazo de matriculacion'
        ]);

        $validar = Matricula::where('id_alumno', $request->id_alumno)
        ->where('id_grupo', $request->id_grupo)
        ->where('id_plazomatricula', $request->id_plazomatricula)->first();
         
        if($validar!=null){
            return back()->with('error', 'La matrícula ya existe');
        }

        try{
            $capacidad = Espacio::find(Grupo::find($request->id_grupo)->id_espacio)->capacidad-Matricula::where('id_grupo', $request->id_grupo)->count();
            if($capacidad<=0){
                return back()->with('error', 'Este grupo ya está lleno');
            }
            $matricula = new Matricula();
            $matricula->id_alumno = $request->id_alumno;
            $matricula->id_grupo = $request->id_grupo;
            $matricula->id_plazomatricula = $request->id_plazomatricula;
            $matricula->fecha_creacion = now()->getTimestamp();
            $matricula->id_prescripcion = $request->id_prescripcion;
            $matricula->save();
            $this->Log("Ha matriculado al Alumno ".$matricula->alumno->nombre." ".$matricula->alumno->apellidos." en el Grupo ".$matricula->grupo->nombre);
            return redirect()->route('alumnos.index')->with('mensaje', 'Matrícula creada');
        }catch(\Exception $ex){
            $this->Log("Error al matricular al Alumno $request->id_alumno en el Grupo $request->id_grupo");
            return back()->with('error', 'No ha podido crearse la matricula: '.$ex->getMessage());
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
        return view('matriculas.edit', compact('matricula'));
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
        ],[
            'id_alumno.required' => 'Es obligatorio el id del alumno',
            'id_plazomatriculacion.required' => 'Es obligatorio el id del plazo de matriculacion'
        ]);
        
        try{
            $capacidad = Espacio::find(Grupo::find($request->id_grupo)->id_espacio)->capacidad-Matricula::where('id_grupo', $request->id_grupo)->count();
            if($capacidad<=0){
                return back()->with('error', 'Este grupo ya está lleno');
            }
            $matricula->id_alumno = $request->id_usuario;
            $matricula->id_grupo = $request->id_grupo;
            $matricula->fecha_creacion = now()->getTimestamp();
            $matricula->id_prescripcion = $request->id_prescripcion;
            $matricula->save();
            $this->Log("Ha modificado la matrícula del Alumno ".$matricula->alumno->nombre." ".$matricula->alumno->apellidos." del Grupo ".$matricula->grupo->nombre);
            return back()->with('mensaje', 'Matrícula modificada');
        }catch(\Exception $ex){
            $this->Log("Error al modificar matrícula del Alumno $request->id_alumno del Grupo $request->id_grupo");
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

    public function matriculas_alumno(Request $request){
        $matriculas = Matricula::where('id_alumno', $request->id_alumno)->paginate(10);
        return view('matriculas.matriculas_alumno', compact('request', 'matriculas'));
    }
}
