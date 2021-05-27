<?php

namespace App\Http\Controllers;

use App\Models\Rolespermiso;
use App\Models\Rol;
use App\Models\Permiso;
use Illuminate\Http\Request;

class RolespermisoController extends Controller
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
        $roles = Rol::orderBy('nombre')->first();
        $permisos = Permiso::orderBy('nombre')->get();
        dd($roles->permiso());
        return view('rolespermisos.rolpermiso', compact('roles', 'permisos'));
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
            'rol' => 'required',
            'permiso' => 'required',
        ]);

        try{
            $rolespermiso = new Rolespermiso();
            $rolespermiso->id_rol = $request->rol;
            $rolespermiso->id_permiso = $request->permiso;
            $rolespermiso->save();
            $this->Log("Ha asignado el rol $request->rol al permiso $request->permiso");
            return redirect()->route('roles.index')->with('mensaje', 'Rol Asignado a Permiso');
        }catch(\Exception $ex){
            $this->Log("Error al asignar el rol $request->rol al permiso $request->permiso");
            return back()->with('error', 'No se ha podido asignar el permiso al rol');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rolespermiso  $rolespermiso
     * @return \Illuminate\Http\Response
     */
    public function show(Rolespermiso $rolespermiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rolespermiso  $rolespermiso
     * @return \Illuminate\Http\Response
     */
    public function edit(Rolespermiso $rolespermiso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rolespermiso  $rolespermiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rolespermiso $rolespermiso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rolespermiso  $rolespermiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rolespermiso $rolespermiso)
    {
        //
    }
}
