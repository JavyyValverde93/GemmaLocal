<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Salario;
use Illuminate\Http\Request;

class SalarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario = Profesor::select('id', 'nombre', 'apellidos', 'id_usuario')->where('id', $request->id_profesor);
        if($usuario==null){
            return back()->with('error', 'Ha habido un error, vuelva a intentarlo');
        }else{
            $usuarios = $usuario->first('id_usuario')->toArray();
            $profesor = $usuario->first();
        }
        $id_usuario = $usuario->first('id_usuario')->id_usuario;
        $salario = Salario::whereIn('id_usuario', $usuarios)->first();
        if($salario==null){
            return view('salarios.create', compact('request', 'id_usuario', 'profesor'));
        }
        return view('salarios.index', compact('salario', 'profesor', 'id_usuario'));
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
            'id_usuario' => 'required',
            'total_mes' => 'required',
            'nomina' => 'required'
        ],[
            'id_usuario.required' => 'Usuario requerido',
            'total_mes.required' => 'Total por mes requerido',
            'nomina.required' => 'Salario requerido'
        ]);

        try{
            $salario = new Salario();
            $salario->id_usuario = $request->id_usuario;
            $salario->total_mes = $request->total_mes;
            $salario->nomina = $request->nomina;
            $salario->fecha_creacion = now()->getTimestamp();
            $salario->fecha_modificacion = now()->getTimestamp();

            $salario->save();
            return back()->with('mensaje', 'Salario actualizado');
        }catch(\Exception $ex){
            return back()->with('error', 'Error al actualizar salario');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salario  $salario
     * @return \Illuminate\Http\Response
     */
    public function show(Salario $salario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salario  $salario
     * @return \Illuminate\Http\Response
     */
    public function edit(Salario $salario)
    {
        return view('salarios.edit', compact('salario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salario  $salario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salario $salario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salario  $salario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salario $salario)
    {
        //
    }
}
