<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    use HasFactory;
	
	protected $fillable=['forma_pago','id_usuario','num_tarjeta','caducidad','descripcion',
						
						'tarifa_asignada','riesgo_maximo','dia_pago','descuento','precio_hora',
						
						'subcuenta_contable','titular_cuenta','dni_titular','nacionalidad_titular',
						
						'email_titular','cuenta','iban','mandato_sepa','swift','fecha_mandato',
						
						'nombre_banco','direccion_banco','poblacion_banco','facturar_empresa',
						
						'fecha_creacion','fecha_modificacion'];
	
	protected $table = "facturaciones";

	public $timestamps = false;	
	
	public function User(){
		return $this->belongsTo(User::class, 'id_usuario');
	}

}

