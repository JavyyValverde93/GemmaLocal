<?php

namespace App\Http\Controllers;

use App\Mail\Gmail;
use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Actividad;
use App\Models\Matricula;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

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
        if($request->ordenar==null){
            $request->ordenar = 'nombre';
        }
        $alumnos=Alumno::select('nombre', 'apellidos', 'id', 'dni', 'telefono')->orderBy($request->ordenar)->nombre($request->nombre)->paginate(10);

		return view('alumnos.index',compact('alumnos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('alumnos.create');
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
            'apellidos' => 'required',
            'dni' => 'required|unique:alumnos',
            'domicilio' => 'required',
            'poblacion' => 'required',
            'provincia' => 'required',
            'pais' => 'required',
            'codigo_postal' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required|unique:alumnos',
            'edad' => 'required',
            'fecha_nacimiento' => 'required',
            'lugar_nacimiento' => 'required',
            'nss' => 'required'
        ],[
            'nombre.required' => 'Es obligatorio el nombre',
            'apellidos.required' => 'Es obligatorio los apellidos',
            'dni.required' => 'Es obligatorio el DNI',
            'domicilio.required' => 'Es obligatorio el domicilio',
            'poblacion.required' => 'Es obligatorio el poblacion',
            'provincia.required' => 'Es obligatorio el provincia',
            'pais.required' => 'Es obligatorio el pais',
            'codigo_postal.required' => 'Es obligatorio el codigo postal',
            'sexo.required' => 'Es obligatorio el sexo',
            'telefono.required' => 'Es obligatorio el telefono',
            'email.required' => 'Es obligatorio el email',
            'edad.required' => 'Es obligatorio el edad',
            'fecha_nacimiento.required' => 'Es obligatorio el fecha nacimiento',
            'lugar_nacimiento.required' => 'Es obligatorio el lugar nacimiento',
            'nss.required' => 'Es obligatorio el NSS'
        ]);
        $nombre = $request->nombre;
        $apellidos = $request->apellidos;
        $dni = $request->dni;
        $ap2 = strrpos($apellidos, " ");

        try{
            $user = new User();
            $user->name = $request->nombre." ".$request->apellidos;
            $user->email = $request->email;
            $pwd = $this->randomPassword();
            $user->password = Hash::make($pwd);
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
            $date = new \DateTime($request->fecha_nacimiento);
            $date = $date->getTimestamp();
            $alumno->fecha_nacimiento = $date;
            $alumno->lugar_nacimiento = $request->lugar_nacimiento;
            $alumno->nss = $request->nss;
            $alumno->observaciones = $request->observaciones;
            $alumno->fecha_creacion = now()->getTimestamp();

            if($request->foto!=null){
                $request->validate(['foto'=>['image']]);
                $nom = $request->foto;
                $nom2 = "/imagenes/alumnos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $alumno->foto = 'storage/'.$nom2;
            }

            /*MAIL*/

            $details = [
                'title' => 'Gracias por regsitrarse',
                'nombre' => "$user->name",
                'email' => "$user->email",
                'pwd' => "$pwd"
            ];

            Mail::to('noreplygemmaalmeria@gmail.com')->send(new Gmail($details));

            $user->save();
            $alumno->id_usuario = $user->id;
            $alumno->save();
            $this->Log("Ha creado el Alumno $alumno->nombre");

            return back()->with('mensaje', 'Alumno creado correctamente');
        }catch(\Exception $ex){
            $this->Log("Error al crear el alumno $request->nombre");
            return back()->with('error', 'No ha podido crearse el alumno'.$ex);
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
        return view('alumnos.show',compact('alumno'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function vistas(Request $request)
    {
        $alumno = Alumno::where('id', $request->id)->first();
        return view('alumnos.vistas',compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
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
        ],[
            'nombre.required' => 'Es obligatorio el nombre',
            'apellidos.required' => 'Es obligatorio los apellidos',
            'dni.required' => 'Es obligatorio el DNI',
            'domicilio.required' => 'Es obligatorio el domicilio',
            'poblacion.required' => 'Es obligatorio el poblacion',
            'provincia.required' => 'Es obligatorio el provincia',
            'pais.required' => 'Es obligatorio el pais',
            'codigo_postal.required' => 'Es obligatorio el codigo postal',
            'sexo.required' => 'Es obligatorio el sexo',
            'telefono.required' => 'Es obligatorio el telefono',
            'email.required' => 'Es obligatorio el email',
            'edad.required' => 'Es obligatorio el edad',
            'fecha_nacimiento.required' => 'Es obligatorio el fecha nacimiento',
            'lugar_nacimiento.required' => 'Es obligatorio el lugar nacimiento',
            'nss.required' => 'Es obligatorio el NSS'
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
            $date = new \DateTime($request->fecha_nacimiento);
            $date = $date->getTimestamp();
            $alumno->fecha_nacimiento = $date;
            $alumno->lugar_nacimiento = $request->lugar_nacimiento;
            $alumno->nss = $request->nss;
            $alumno->observaciones = $request->observaciones;
            if($request->foto!=null){
                $request->validate(['foto'=>['image']]);
                $nom = $request->foto;
                $nom2 = "imagenes/alumnos/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $alumno->foto = 'storage/'.$nom2;
            }

            $alumno->save();
            $this->Log("Ha modificado al Alumno $alumno->nombre");

            return back()->with('mensaje', 'Alumno modificado correctamente');
        }catch(\Exception $ex){
            $this->Log("Error al modificar el alumno $request->nombre");
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
        // $nombre[0].$apellidos[0].$apellidos[1].$apellidos[2].$apellidos[$ap2+1].$apellidos[$ap2+2].$apellidos[$ap2+3].$dni[strlen($dni)-4].$dni[strlen($dni)-3].$dni[strlen($dni)-2]."@moodle.com";
    }


    public function cambiarFoto(){

        return view('administracion/foto-perfil');

    }


    public function cambiarDatosPersonales(){

        return view('administracion/lista-alumnos-datospersonales');
    }

    public function vista(Request $request){
        if($request->id_alumno!=null){
            $alumno = Alumno::where('id', $request->id_alumno)->first();
            return redirect()->route('alumnos.show', $alumno);
        }else{
            return redirect()->route('alumnos.create');
        }
    }

    public function ver_actividades(Request $request){
        $actividades = Actividad::whereIn('id_grupo', Grupo::whereIn('id', Matricula::where('id_alumno', $request->id_alumno)->get('id_grupo'))->get('id'))->paginate(10);
        return view('alumnos.ver_actividades', compact('request', 'actividades'));
    }
}