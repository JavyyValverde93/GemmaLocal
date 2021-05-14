<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
	
	
	protected $fillable=['id_usuario','nombre','apellidos','foto', 'dni', 'domicilio','poblacion','provincia',
						
						'pais','codigo_postal','sexo','telefono','telefono2','email2','edad',
						
						'fecha_nacimiento','lugar_nacimiento','forma_pago','entidad_ingreso',
						
						'nss','fecha_creacion','fecha_dado_baja','email','observaciones',
						
						'cuenta_ingreso','swift','iban','impuesto','irpf'];
						
	protected $table = "profesores";
	
	public $timestamps = false;	
	
	public function Grupo(){
		return $this->hasMany(Grupo::class);
	}
	
}
