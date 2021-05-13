<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
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
        ]);

        try{
            $matricula = new Matricula();
            $matricula->id_alumno = $request->id_usuario;
            $matricula->id_grupo = $request->id_grupo;
            $matricula->fecha_creacion = now()->getTimestamp();
            $matricula->id_prescripcion = $request->id_prescripcion;
            $matricula->save();
            return back()->with('mensaje', 'Matrícula creada');
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
        //
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
