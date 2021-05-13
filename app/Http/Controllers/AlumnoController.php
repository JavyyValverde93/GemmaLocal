<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AlumnoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Mostrar un listado de alumnos

        $alumnos=Alumno::orderBy('nombre')->nombre($request->nombre)->paginate(5);

		return view('alumnos.index',compact('alumnos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('administracion/nuevo-alumno');
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
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'foto' => 'required',
            'domicilio' => 'required',
            'poblacion' => 'required',
            'provincia' => 'required',
            'pais' => 'required',
            'codigo_postal' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'edad' => 'required',
            'fecha_nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'nss' => 'required'
        ]);
        $nombre = $request->nombre;
        $apellidos = $request->apellidos;
        $dni = $request->dni;
        $ap2 = strrpos($apellidos, " ");

        try{
            $user = new User();
            $user->name = $request->nombre + $request->apellidos;
            $user->email = $nombre[0].$apellidos[0].$apellidos[1].$apellidos[2].$apellidos[$ap2+1].$apellidos[$ap2+2].$apellidos[$ap2+3].$dni[strlen($dni)-4].$dni[strlen($dni)-3].$dni[strlen($dni)-2]."@moodle.com";
            $user->password = Hash::make($this->randomPassword());
            $user->fecha_creacion = now()->getTimestamp();
            $user->fecha_modificacion = now()->getTimestamp();

            $alumno = new Alumno();
            $alumno->nombre = $request->nombre;
            $alumno->apellidos = $request->apellidos;
            $alumno->dni = $request->dni;
            $alumno->domicilio = $request->domicilio;
            $alumno->poblacion = $request->poblacion;
            $alumno->provincia = $request->provincia;
            $alumno->pais = $request->pais;
            $alumno->codigo_postal = $request->codigo_postal;
            $alumno->sexo = $request->sexo;
            $alumno->telefono = $request->telefono;
            $alumno->telefono2 = $request->telefono2;
            $alumno->email = $request->email;
            $alumno->email2 = $request->email2;
            $alumno->edad = $request->edad;
            $alumno->fecha_nacimiento = $request->fecha_nacimiento;
            $alumno->lugar_nacimiento = $request->lugar_nacimiento;
            $alumno->nss = $request->nss;
            $alumno->observaciones = $request->observaciones;
            $alumno->fecha_creacion = now()->getTimestamp();
            if($request->has('foto')){
                $request->validate(['foto'=>['image']]);
                $nom = $request->foto;
                $nom2 = "/imagenes/alumnos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $alumno->foto = 'storage/'.$nom2;
            }
            $user->save();
            $alumno->id_usuario = $user->id;
            $alumno->save();

            return back()->with('mensaje', 'Alumno creado correctamente');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido crearse el alumno');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('administracion/lista-alumnos-editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'foto' => 'required',
            'domicilio' => 'required',
            'poblacion' => 'required',
            'provincia' => 'required',
            'pais' => 'required',
            'codigo_postal' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'edad' => 'required',
            'fecha_nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'nss' => 'required'
        ]);

        try{

            $alumno->nombre = $request->nombre;
            $alumno->apellidos = $request->apellidos;
            $alumno->dni = $request->dni;
            $alumno->domicilio = $request->domicilio;
            $alumno->poblacion = $request->poblacion;
            $alumno->provincia = $request->provincia;
            $alumno->pais = $request->pais;
            $alumno->codigo_postal = $request->codigo_postal;
            $alumno->sexo = $request->sexo;
            $alumno->telefono = $request->telefono;
            $alumno->telefono2 = $request->telefono2;
            $alumno->email = $request->email;
            $alumno->email2 = $request->email2;
            $alumno->edad = $request->edad;
            $alumno->fecha_nacimiento = $request->fecha_nacimiento;
            $alumno->lugar_nacimiento = $request->lugar_nacimiento;
            $alumno->nss = $request->nss;
            $alumno->observaciones = $request->observaciones;
            if($request->has('foto')){
                $request->validate(['foto'=>['image']]);
                $nom = $request->foto;
                $nom2 = "imagenes/alumnos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $alumno->foto = 'storage/'.$nom2;
            }

            $alumno->save();

            return back()->with('mensaje', 'Alumno modificado correctamente');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido modificarse el alumno');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }

    ////////////////////////////////////////
    public function randomPassword() {
        $alphabet = '!@?.()abcdefghijklmnopqrstuvwxyz!@?.()ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@?.()';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


    public function cambiarFoto(){

        return view('administracion/foto-perfil');


    }


    public function cambiarDatosPersonales(){


        return view('administracion/lista-alumnos-datospersonales');

    }



}
