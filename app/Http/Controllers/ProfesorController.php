<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::orderBy('id')->paginate(10);
        return view('profesores.index', compact('profesores'));
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

            $profesor = new Profesor();
            $profesor->nombre = $request->nombre;
            $profesor->apellidos = $request->apellidos;
            $profesor->dni = $request->dni;
            $profesor->domicilio = $request->domicilio;
            $profesor->poblacion = $request->poblacion;
            $profesor->provincia = $request->provincia;
            $profesor->pais = $request->pais;
            $profesor->codigo_postal = $request->codigo_postal;
            $profesor->sexo = $request->sexo;
            $profesor->telefono = $request->telefono;
            $profesor->telefono2 = $request->telefono2;
            $profesor->email = $request->email;
            $profesor->email2 = $request->email2;
            $profesor->edad = $request->edad;
            $profesor->fecha_nacimiento = $request->fecha_nacimiento;
            $profesor->lugar_nacimiento = $request->lugar_nacimiento;
            $profesor->nss = $request->nss;
            $profesor->observaciones = $request->observaciones;
            $profesor->forma_pago = $request->forma_pago;
            $profesor->entidad_ingreso = $request->entidad_ingreso;
            $profesor->cuenta_ingreso = $request->cuenta_ingreso;
            $profesor->swift = $request->swift;
            $profesor->iban = $request->iban;
            $profesor->impuesto = $request->impuesto;
            $profesor->irpf = $request->irpf;
            if($request->has('foto')){
                $request->validate(['foto'=>['image']]);
                $nom = $request->foto;
                $nom2 = "imagenes/profesores/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $profesor->foto = 'storage/'.$nom2;
            }

            $user->save();
            $profesor->id_usuario = $user->id;
            $profesor->save();

            return back()->with('mensaje', 'Profesor creado correctamente');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido crear el profesor');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
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

            $profesor->nombre = $request->nombre;
            $profesor->apellidos = $request->apellidos;
            $profesor->dni = $request->dni;
            $profesor->domicilio = $request->domicilio;
            $profesor->poblacion = $request->poblacion;
            $profesor->provincia = $request->provincia;
            $profesor->pais = $request->pais;
            $profesor->codigo_postal = $request->codigo_postal;
            $profesor->sexo = $request->sexo;
            $profesor->telefono = $request->telefono;
            $profesor->telefono2 = $request->telefono2;
            $profesor->email = $request->email;
            $profesor->email2 = $request->email2;
            $profesor->edad = $request->edad;
            $profesor->fecha_nacimiento = $request->fecha_nacimiento;
            $profesor->lugar_nacimiento = $request->lugar_nacimiento;
            $profesor->nss = $request->nss;
            $profesor->observaciones = $request->observaciones;
            $profesor->forma_pago = $request->forma_pago;
            $profesor->entidad_ingreso = $request->entidad_ingreso;
            $profesor->cuenta_ingreso = $request->cuenta_ingreso;
            $profesor->swift = $request->swift;
            $profesor->iban = $request->iban;
            $profesor->impuesto = $request->impuesto;
            $profesor->irpf = $request->irpf;
            if($request->has('foto')){
                $request->validate(['foto'=>['image']]);
                $nom = $request->foto;
                $nom2 = "imagenes/profesores/".uniqid()."_".$nom->getClientOriginalName();
                Storage::disk("public")->put($nom2, File::get($nom));
                $profesor->foto = 'storage/'.$nom2;
            }

            $profesor->save();

            return back()->with('mensaje', 'Profesor modificado correctamente');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido modificarse el profesor');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
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
}
