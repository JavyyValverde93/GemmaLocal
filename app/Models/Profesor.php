<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

	public function scopeNombre($query, $p){
        if($p!=null){
            // \DB es igual a poner use Illuminate\Support\Facades\DB; y DB
            return $query->where(DB::raw("CONCAT(nombre, ' ', apellidos, ' ', email, ' ', telefono, ' ', dni, ' ', id, ' ', domicilio, ' ', poblacion)"), "LIKE", "%$p%");
        }else{
            return $query->where('nombre', "LIKE", "%");
        }
    }
	
}
