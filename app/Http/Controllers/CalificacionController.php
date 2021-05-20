<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Calificacion;
use App\Models\Grupo;
use App\Models\Alumno;
use App\Models\Matricula;
use Illuminate\Http\Request;

class CalificacionController extends Controller
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
    public function create(Request $request)
    {
        $alumnos = Matricula::orderBy('id_alumno')->where('id_grupo', $request->id_grupo)->paginate(10);
        $calificaciones = Calificacion::orderBy('id_alumno')->where('id_grupo',$request->id_grupo)->get();
        return view('calificaciones.calificar-grupo', compact('request', 'alumnos', 'calificaciones'));

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
            'id_periodocalificacion' => 'required',
            'nota' => 'required'
        ]);

        try{
            $calificacion = new Calificacion();

            $calificacion->id_alumno = $request->id_alumno;
            $calificacion->id_grupo = $request->id_grupo;
            $calificacion->id_periodocalificacion = $request->id_periodocalificacion;
            $calificacion->nota = $request->nota;

            $calificacion->save();

            return back()->with('mensaje', 'Calificación creada');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al calificar');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificacion $calificacion)
    {
        return view('calificaciones.edit', compact('calificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificacion $calificacion)
    {
        $request->validate([
            'id_alumno' => 'required',
            'id_actividad' => 'required',
            'id_grupo' => 'required',
            'id_periodocalificacion' => 'required',
            'nota' => 'required'
        ]);

        try{

            $calificacion->id_alumno = $request->id_alumno;
            $calificacion->id_actividad = $request->id_actividad;
            $calificacion->id_grupo = $request->id_grupo;
            $calificacion->id_periodocalificacion = $request->id_periodocalificacion;
            $calificacion->nota = $request->nota;

            $calificacion->save();

            return back()->with('mensaje', 'Calificación modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al modificar la calificación');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }

    ///////////////////////////////////////////////

    public function calificarGrupo(Request $request){

          for($i=0;$i<count($request->nota);$i++){


            $existe=Calificacion::where('id_grupo',$request->id_grupo)->where('id_alumno',$request->id_alumno[$i])->count();

            if($existe>0){


                    if($request->nota[$i]!=null){

                        $calificacion = Calificacion::where('id_alumno',$request->id_alumno[$i]);

                        $calificacion->update(['nota' => $request->nota[$i]]);
                    }



        }else{



                $calificacion = new Calificacion();

                $calificacion->id_alumno = $request->id_alumno[$i];
                $calificacion->id_grupo = $request->id_grupo;
                $calificacion->id_periodocalificacion = $request->id_periodocalificacion;

                if($request->nota[$i]!=null){

                    $calificacion->nota = $request->nota[$i];

                    $calificacion->save();


                }


        }

          }

          return back()->with('mensaje', 'Calificaciones actualizadas');

    }
}
