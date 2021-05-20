<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use App\Models\Profesor;
use Illuminate\Http\Request;

class FacturacionController extends Controller
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
        $salario = Facturacion::whereIn('id_usuario', $usuarios)->first();
        if($salario==null){
            return view('facturaciones.create', compact('request', 'id_usuario', 'profesor'));
        }
        return view('facturaciones.index', compact('salario', 'profesor', 'id_usuario'));
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
            'forma_pago' => 'required',
            'num_tarjeta' => 'required',
            'caducidad' => 'required',
            'caducidad2' => 'required',
            'tarifa_asignada' => 'required',
            'riesgo_maximo' => 'required',
            'dia_pago' => 'required',
            'descuento' => 'required',
            'titular_cuenta' => 'required',
            'precio_hora' => 'required',
            'subcuenta_contable' => 'required',
            'titular_cuenta' => 'required',
            'dni_titular' => 'required',
            'email_titular' => 'required',
            'cuenta' => 'required',
            'iban' => 'required',
            'mandato_sepa' => 'required',
            'fecha_mandato' => 'required',
            'nombre_banco' => 'required',
            'swift' => 'required',
            'direccion_banco' => 'required',
            'poblacion_banco' => 'required',
            'facturar_empresa' => 'required',
        ]);

        try{
            $facturacion = new Facturacion();
            $facturacion->forma_pago = $request->forma_pago;
            $facturacion->num_tarjeta = $request->num_tarjeta;
            $facturacion->caducidad = $request->caducidad."/".$request->caducidad2;
            $facturacion->descripcion = $request->descripcion;
            $facturacion->tarifa_asignada = $request->tarifa_asignada;
            $facturacion->riesgo_maximo = $request->riesgo_maximo;
            $facturacion->dia_pago = $request->dia_pago;
            $facturacion->descuento = $request->descuento;
            $facturacion->precio_hora = $request->precio_hora;
            $facturacion->subcuenta_contable = $request->subcuenta_contable;
            $facturacion->titular_cuenta = $request->titular_cuenta;
            $facturacion->dni_titular = $request->dni_titular;
            $facturacion->nacionalidad_titular = $request->nacionalidad_titular;
            $facturacion->email_titular = $request->email_titular;
            $facturacion->cuenta = $request->cuenta;
            $facturacion->iban = $request->iban;
            $facturacion->mandato_sepa = $request->mandato_sepa;
            $facturacion->swift = $request->swift;
            $facturacion->fecha_mandato = $request->fecha_mandato;
            $facturacion->nombre_banco = $request->nombre_banco;
            $facturacion->direccion_banco = $request->direccion_banco;
            $facturacion->poblacion_banco = $request->poblacion_banco;
            $facturacion->facturar_empresa = $request->facturar_empresa;

            $facturacion->save();
            return back()->with('mensaje', 'Facturación actualizada');
        }catch(\Exception $ex){
            return back()->with('error', 'No ha podido actualizarse la facturación');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturacion $facturacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturacion $facturacion)
    {
        //
    }
}
