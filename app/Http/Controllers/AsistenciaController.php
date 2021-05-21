<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Alumno;
use App\Models\Matricula;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $alumnos = Asistencia::orderBy('fecha_creacion', 'desc')->where('id_grupo', $request->id_grupo)->paginate(15);
        $alumnos = Matricula::orderBy('id')->where('id_grupo', $request->id_grupo)->get();
        return view('asistencias.index', compact('alumnos', 'request'));
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
            'id_alumno' => 'required',
            'id_grupo' => 'required',
            'justificada' => 'required',
            'ausente' => 'required'
        ],[
            'id_alumno.required'=>'Es obligatorio el id alumno',
            'id_grupo.required'=>'Es obligatorio el id grupo',
            'id_categoria.required'=>'Es obligatorio el id categoria',
            'justificada.required'=>'Es obligatorio el justificada',
            'ausente.required'=>'Es obligatorio el ausente'
        ]);

        try{
            $asistencia = new Asistencia();
            $asistencia->id_alumno = $request->id_alumno;
            $asistencia->id_grupo = $request->id_grupo;
            $asistencia->justificada = $request->justificada;
            $asistencia->ausente = $request->ausente;
            $asistencia->fecha_creacion = now()->getTimestamp();
            $asistencia->fecha_modificacion = now()->getTimestamp();

            $asistencia->save();

            return back()->with('mensaje', 'Asistencia creada');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido crear la asistencia');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        return view('asistencias.edit', compact('asistencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        $request->validate([
            'id_alumno' => 'required',
            'id_grupo' => 'required',
            'justificada' => 'required',
            'ausente' => 'required',
        ],[
            'id_alumno.required'=>'Es obligatorio el id alumno',
            'id_grupo.required'=>'Es obligatorio el id grupo',
            'id_categoria.required'=>'Es obligatorio el id categoria',
            'justificada.required'=>'Es obligatorio el justificada',
            'ausente.required'=>'Es obligatorio el ausente'
        ]);

        try{
            $asistencia->id_alumno = $request->id_alumno;
            $asistencia->id_grupo = $request->id_grupo;
            $asistencia->justificada = $request->justificada;
            $asistencia->ausente = $request->ausente;
            $asistencia->fecha_modificacion = now()->getTimestamp();

            $asistencia->save();

            return back()->with('mensaje', 'Asistencia modificada');
        }catch(\Exception $ex){
            return back()->with('error', 'No se ha podido modificar la asistencia');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }

    /////////////////////////

    public function pasarListaGrupo(Request $request){

          for($i=0;$i<count($request->id_alumno);$i++){

            $datoasistencia=false;
            $alumno=$request->id_alumno[$i];
            $asistencia = new Asistencia();
            $asistencia->id_alumno = $request->id_alumno[$i];
            $asistencia->id_grupo = $request->id_grupo;

            if($request->$alumno==1){

                $datoasistencia=true;

            }

            $asistencia->ausente = $datoasistencia;

            $asistencia->fecha_creacion = now()->getTimestamp();
            $asistencia->fecha_modificacion = now()->getTimestamp();

            $asistencia->save();


          }

        //   $this->Log("Ha pasdo Lista en el grupo $asistencia->grupo->nombre");
          return back()->with('mensaje', 'Asistencias asignadas');


    }


    public function verasistencias(Request $request, Alumno $alumno){

        $asistencia=Asistencia::where('id_alumno',$alumno->id)->paginate(6);

        return view('asistencias.listaasistencias',compact('alumno','asistencia','request'));

    }

    public function justificarFalta(Asistencia $asistencia){

         $asistencia->update(['justificada'=>true]);

         return back()->with('mensaje', 'Falta Justificada');

    }

}
