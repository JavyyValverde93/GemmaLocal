<?php

namespace App\Http\Controllers;

use App\Models\Rolespermiso;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\User;
use Database\Seeders\RolespermisoSeeder;
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
        // $roles = Rol::orderBy('nombre')->get();
        // if($request->rol!=null){
        //     $perms = Permiso::orderBy('nombre');
        //     $permisos = $perms->whereIn('id', Rolespermiso::where('id_rol', '!=', $request->rol)->get('id'))->get();
        //     $permisosQuitar = Rolespermiso::where('id_rol', $request->rol)->get();
        // }else{
        //     $perms = Permiso::orderBy('nombre');
        //     $permisos = $perms->get();
        //     $permisosQuitar = null;
        // }
        $permisos = Permiso::orderBy('id')->get();
        $permisos2 = Rolespermiso::where('id_rol', $request->rol)->get();
        return view('rolespermisos.rolpermisos', compact('permisos', 'permisos2', 'request'));
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
            'rol' => 'required'
        ]);

        try{
            for($i=1; $i<=Permiso::orderBy('id')->get()->count(); $i++){
                if(!isset($request->$i)){    
                    $rolpermiso = Rolespermiso::where('id_rol', $request->rol)->where('id_permiso', $i)->first();
                    if($rolpermiso!=null){
                        $rolpermiso->delete();
                    }        
                }else{
                    if(Rolespermiso::where('id_rol', $request->rol)->where('id_permiso', $i)->first()==null){
                        $rolespermiso = new Rolespermiso();
                        $rolespermiso->id_rol = $request->rol;
                        $rolespermiso->id_permiso = $request->$i;
                        $rolespermiso->save();  
                    }
                }
            }
        
            return back()->with('mensaje', 'Permisos asignados');

        }catch(\Exception $ex){
            return back()->with('error', 'No se han podido asignar los permisos');
        }





















        // $request->validate([
        //     'rol' => 'required',
        //     'permiso' => 'required',
        // ],[
        //     'permiso.required' => "El permiso no existe"
        // ]);
            
        // try{
        //     $validar = Rolespermiso::where('id_rol', $request->rol)->where('id_permiso', $request->permiso)->first();
        //     if($validar!=null){
        //         return back()->with('error', 'Este permiso ya existe para este Rol');
        //     }
        //     $rolespermiso = new Rolespermiso();
        //     $rolespermiso->id_rol = $request->rol;
        //     $rolespermiso->id_permiso = $request->permiso;
        //     $rolespermiso->save();
        //     $this->Log("Ha asignado el rol $request->rol al permiso $request->permiso");
        //     return back()->with('mensaje', 'Rol Asignado a Permiso');
        // }catch(\Exception $ex){
        //     $this->Log("Error al asignar el rol $request->rol al permiso $request->permiso");
        //     return back()->with('error', 'No se ha podido asignar el permiso al rol');
        // }
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

    public function delete(Request $request){
        $request->validate([
            'rol' => 'required',
            'permisoQuitar' => 'required'
        ]);

        try{
            $del = Rolespermiso::where('id_rol', $request->rol)->where('id_permiso', $request->permisoQuitar)->first();
            $del->delete();
            return back()->with('mensaje', 'Permiso retirado de rol correctamente');
        }catch(\Exception $ex){
            return back()->with('error', 'El permiso no ha podido retirarse');
        }
    }
}
