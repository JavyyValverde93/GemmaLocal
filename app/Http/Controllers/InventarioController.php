<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inventario = Inventario::orderBy('fecha_modificacion', 'desc')->nombre($request->nombre)->paginate(15);
        return view('inventario.index', compact('inventario', 'request'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function vistas(Request $request)
    {
        $inventario = Inventario::where('id', $request->id)->first();
        return view('inventario.vistas',compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
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
            'datos' => 'required'
            
        ],[
            'nombre.required'=>'Es obligatorio el nombre',
            'datos.required'=>'Es obligatorio el datos'
        ]);

        try{
            $inventario = new Inventario();
            $inventario->nombre = $request->nombre;
            $inventario->datos = $request->datos;
            $inventario->fecha_creacion = now()->getTimestamp();
            $inventario->fecha_modificacion = now()->getTimestamp();
            $inventario->save();
            $this->Log("Ha añadido $inventario->nombre al Inventario");
            return redirect()->route('inventario.index')->with('mensaje', $request->nombre.' añadido a inventario');
        }catch(\Exception $ex){
            $this->Log("Error al añadir $request->nombre al Inventario");
            return back()->with('error', 'No ha podido definirse el inventario');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        return view('inventario.show',compact('inventario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        return view('inventario.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'nombre' => 'required',
            'datos' => 'required'
            
        ],[
            'nombre.required'=>'Es obligatorio el nombre',
            'datos.required'=>'Es obligatorio el datos'
        ]);

        try{
            $inventario->nombre = $request->nombre;
            $inventario->datos = $request->datos;
            $inventario->fecha_creacion = now()->getTimestamp();
            $inventario->fecha_modificacion = now()->getTimestamp();
            $inventario->save();
            $this->Log("Ha modificado $inventario->nombre del Inventario");
            return back()->with('mensaje', 'Inventario modificado');
        }catch(\Exception $ex){
            $this->Log("Error al modificar $request->nombre del Inventario");
            return back()->with('error', 'No ha podido modificarse el inventario');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
