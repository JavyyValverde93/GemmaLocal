<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tutores = Tutor::where('id_alumno', $request->id_alumno)->paginate(10);
        $alumno = $request->alumno;
        $id_alumno = $request->id_alumno;
        return view('tutores.index', compact('tutores', 'alumno', 'request', 'id_alumno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_alumno = $request->id_alumno;
        return view('tutores.create', compact('id_alumno', 'request'));
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
            'id_alumno' => 'required',
            'relacion' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        $validar = Tutor::where('id_alumno', $request->id_alumno)
        ->where('nombre', $request->nombre)
        ->where('dni', $request->dni)->first();
         
        if($validar!=null){
            return back()->with('error', 'El tutor ya existe');
        }

        try{
            $tutor = new Tutor();
            $tutor->nombre = $request->nombre;
            $tutor->id_alumno = $request->id_alumno;
            $tutor->relacion = $request->relacion;
            $tutor->dni = $request->dni;
            $tutor->telefono = $request->telefono;
            $tutor->direccion = $request->direccion;
            $tutor->save();

            return redirect()->route('tutores.index', ["id_alumno=$request->id_alumno", "alumno=$request->alumno"])->with('mensaje', 'Tutor creado');

        }catch(\Exception $ex){
            return back()->with('error','No se ha podido crear el Tutor');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
