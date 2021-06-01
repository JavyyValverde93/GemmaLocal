<?php

namespace App\Http\Controllers;

use App\Models\Rolespermiso;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    public function create(Request $request)
    {
        $roles = Rol::orderBy('nombre')->get();
        if($request->rol!=null){
            $permisos = Permiso::orderBy('nombre')->whereIn('id', Rolespermiso::where('id_rol', '!=', $request->rol)->get('id'))->get();
        }else{
            $permisos = Permiso::orderBy('nombre')->get();
        }
        return view('rolespermisos.rolpermiso', compact('roles', 'permisos', 'request'));
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
        ],[
            'permiso.required' => "El permiso no existe"
        ]);
            
        try{
            $validar = Rolespermiso::where('id_rol', $request->rol)->where('id_permiso', $request->permiso)->first();
            if($validar!=null){
                return back()->with('error', 'Este permiso ya existe para este Rol');
            }
            $rolespermiso = new Rolespermiso();
            $rolespermiso->id_rol = $request->rol;
            $rolespermiso->id_permiso = $request->permiso;
            $rolespermiso->save();
            $this->Log("Ha asignado el rol $request->rol al permiso $request->permiso");
            return back()->with('mensaje', 'Rol Asignado a Permiso');
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
