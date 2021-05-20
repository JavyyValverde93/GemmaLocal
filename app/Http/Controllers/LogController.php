<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logs = Log::orderBy('id', 'desc')->accion($request->nombre)->where('id_usuario', Auth::user()->id)->paginate(15);
        return view('logs.index', compact('logs', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_usuario = Auth::user()->id;
        return view('logs.create', compact('id_usuario'));
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
            'accion' => 'required',
        ]);

        try{
            $log = new Log();
            $log->id_usuario = $request->id_usuario;
            $log->accion = $request->accion;
            $log->fecha_creacion = now()->getTimestamp();
            $log->save();
            $this->Log("Ha creado el Log $request->accion");
            return redirect()->route('logs.index')->with('mensaje', 'Log creado');
        }catch(\Exception $ex){
            $this->Log("Error al crear Log $request->accion");
            return back()->with('error', 'Error al crear el log');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        return view('logs.edit', compact('log'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
